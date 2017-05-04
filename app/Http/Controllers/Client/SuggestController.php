<?php namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Stock;
use App\Models\StockTag;
use App\Models\Order;
use App\Models\OrderTag;

class SuggestController extends Controller
{
	//
	public function suggestPrice(Request $request) {
		$parent_cate = $request->prtcate;
		$itemname = $request->itemname;
		$cate = $request->cate;
		$tags = explode(',', $request->tags);
		$tagModel = new Tag();
		$price = 0;
		$price_max = 0;
		$price_min = 1000000;
		$count = 0;

		for ($i=0; $i < count($tags); $i++) {
			$temp = $tagModel->getTagByAlias(changeTitle($tags[$i]));
			if ($temp) {
				$tags[$i] = $temp->id;
			}
			else {
				$tags[$i] = -1;
			}
		}

		if ($parent_cate == 'stock') {
			$stockTagModel = new StockTag();
			$stocks = DB::table('stocks')->where('cate_id',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->get();
			$reviews = DB::table('reviews')->select('voted_user_id','vote');
			foreach ($stocks as $stock) {
				$stockTag = $stockTagModel->getTagByStockId($stock->id);
				$review = $reviews->where('voted_user_id',$stock->user_id)->avg('vote');
				$point = compare_tag($tags, $stockTag);
				
				if ($point >= 50) {
					if ($stock->price < $price_min) {
						$price_min = $stock->price;
					}
					if ($stock->price > $price_max) {
						$price_max = $stock->price;
					}
					$price += $stock->price * $review;
					$count += 1 * $review;
				}
			}
			if ($count > 0) {
				$price = round($price / $count);
		        echo '<label for="priceMax">Giá cao nhất: </label>
                <button type="button" class="btn btn-block btn-max" id="priceMax">'.$price_max.' VND</button>
                <label for="priceSuggest">Giá đề nghị: </label>
                <button type="button" class="btn btn-block btn-suggest" id="priceSuggest">'.$price.' VND</button>
                <label for="priceMin">Giá thấp nhất: </label>
                <button type="button" class="btn btn-block btn-min" id="priceMin">'.$price_min.' VND</button>';
			}
			else {
				echo "<p>Không có sản phẩm phù hợp.</p>";
			}
		}
		else {			
		// 	$orderTagModel = new OrderTag();
		// 	$orders = DB::table('orders')->where('cate_id',$cate)->orwhere('name','LIKE','%'.$itemname.'%')
		// 				->join('reviews','orders.user_id','=','reviews.voted_user_id')
		// 				->select(DB::raw('orders.*, avg(reviews.vote) as vote'))
		// 				->groupBy('orders.id')
		// 				->get();
		// 	foreach ($orders as $order) {
		// 		$orderTag = $orderTagModel->getTagByOrderId($order->id);
		// 		$point = compare_tag($tags, $orderTag);
		// 		if ($point >= 50) {
		// 			if ($order->price < $price_min) {
		// 				$price_min = $order->price;
		// 			}
		// 			if ($order->price > $price_max) {
		// 				$price_max = $order->price;
		// 			}
		// 			$price += $order->price * $order->vote;
		// 			$count += 1 * $order->vote;
		// 		}
		// 	}
		// 	$price = round($price / $count);
			echo "testing4-2<br>";
		}
		// return response()->json(['priceSuggest'=>$price, 'priceMax'=>$price_max, 'priceMin'=>$price_min]);
	}

	public function getHint(Request $request) {
		$tags = Tag::select('id','name')->get()->toArray();
        $str = '';
        for ($i=1; $i<=count($tags); $i++) {
            if ($i == count($tags)) {
                $str = $str.$tags[$i-1]['name'];
            }
            else {
                $str = $str.$tags[$i-1]['name'].',';
            }
        }
        $str = explode(',', $str);
        $q = $request->q;
        $hint = "";
        if ($q !== "") {
		    $q = strtolower($q);
		    $len=strlen($q);
		    foreach($str as $name) {
		        if (stristr($q, substr($name, 0, $len))) {
		            if ($hint === "") {
		                $hint = $name;
		            } else {
		                $hint .= ", $name";
		            }
		        }
		    }
		}
		echo $hint === "" ? "Chưa có tag này." : $hint;
	}
}
