<?php namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Stock;
use App\Models\StockTag;
use App\Models\Order;
use App\Models\OrderTag;
use App\Models\Review;

class SuggestController extends Controller
{
	//
	public function suggestPrice(Request $request) {
		$parent_cate = $request->prtcate;
		$itemname = $request->itemname;
		$cate = $request->cate;
		$tags = explode(',', $request->tags);
		$tagModel = new Tag();
		$reModel = new Review();
		$price = 0.0;
		$price_max = 0.0;
		$price_min = 100000000000000.0;
		$count = 0.0;

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
			foreach ($stocks as $stock) {
				$stockTag = $stockTagModel->getTagByStockId($stock->id);
				$review = $reModel->getAverageVote($stock->user_id);
				$review += 0.5;
				$point = compare_tag($tags, $stockTag);
				
				if ($point >= 50) {
					if ($stock->price < $price_min) {
						$price_min = $stock->price;
					}
					if ($stock->price > $price_max) {
						$price_max = $stock->price;
					}
					$price += $stock->price * $review;
					$count += 1.0 * $review;
				}
			}
			if ($count > 0) {
				$price = round($price / $count / 10000) * 10000;
				// echo $price_max.' - '.$price.' - '.$price_min;
				echo '<label for="priceMax">Giá cao nhất: </label>
				<button type="button" class="btn btn-block btn-price" value='.$price_max.'>'.number_format($price_max).' VND</button>
				<label for="priceSuggest">Giá đề nghị: </label>
				<button type="button" class="btn btn-block btn-price" value='.$price.'>'.number_format($price).' VND</button>
				<label for="priceMin">Giá thấp nhất: </label>
				<button type="button" class="btn btn-block btn-price" value='.$price_min.'>'.number_format($price_min).' VND</button>';
			}
			else {
				echo "<p>Không có tin bán phù hợp.</p>";
			}
		}
		else {
			$orderTagModel = new OrderTag();
			$orders = DB::table('orders')->where('cate_id',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->get();
			foreach ($orders as $order) {
				$orderTag = $orderTagModel->getTagByOrderId($order->id);
				$review = $reModel->getAverageVote($stock->user_id);
				$review += 0.5;
				$point = compare_tag($tags, $orderTag);
				if ($point >= 50) {
					if ($order->price < $price_min) {
						$price_min = $order->price;
					}
					if ($order->price > $price_max) {
						$price_max = $order->price;
					}
					$price += $order->price * $review;
					$count += 1.0 * $review;
				}
			}
			if ($count > 0) {
				$price = round($price / $count);
				echo '<label for="priceMax">Giá cao nhất: </label>
				<button type="button" class="btn btn-block btn-max" id="priceMax" value="'.$price_max.'">'.number_format($price_max).' VND</button>
				<label for="priceSuggest">Giá đề nghị: </label>
				<button type="button" class="btn btn-block btn-suggest" id="priceSuggest" value="'.$price.'">'.number_format($price).' VND</button>
				<label for="priceMin">Giá thấp nhất: </label>
				<button type="button" class="btn btn-block btn-min" id="priceMin" value="'.$price_min.'">'.number_format($price_min).' VND</button>';
			}
			else {
				echo "<p>Không có tin mua phù hợp.</p>";
			}
		}
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
