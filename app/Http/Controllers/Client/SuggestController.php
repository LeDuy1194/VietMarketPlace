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
		$count = 0;
		echo "testing";

		for ($i; $i < count($tags); $i++) {
			$temp = $tagModel->getTagByAlias(changeTitle($tags[$i]));
			if ($temp) {
				$tag[$i] = $temp->id;
			}
			else {
				$tag[$i] = -1;
			}
		}

		if ($parent_cate == 'stock') {
			$price_max = Stock::where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->max('price');
			$price_min = Stock::where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->min('price');

			$stockTagModel = new StockTag();
			$stocks = DB::table('stocks')->where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')
						->join('reviews','stocks.user_id','=','reviews.voted_user_id')
						->select(DB::raw('stocks.*, avg(reviews.vote) as vote'))
						->groupBy('stocks.id')
						->get();
			foreach ($stocks as $stock) {
				$stockTag = $stockTagModel->getTagByStockId($stock->id);
				$point = compare_tag($tags, $stockTag);
				if ($point >= 50) {
					$price += $stock->price * $stock->vote;
					$count += 1 * $stock->vote;
				}
			}
			$price = round($price / $count);
		}
		else {
			$price_max = Order::where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->max('price');
			$price_min = Order::where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')->min('price');
			
			$orderTagModel = new OrderTag();
			$orders = DB::table('orders')->where('cate',$cate)->orwhere('name','LIKE','%'.$itemname.'%')
						->join('reviews','orders.user_id','=','reviews.voted_user_id')
						->select(DB::raw('orders.*, avg(reviews.vote) as vote'))
						->groupBy('orders.id')
						->get();
			foreach ($orders as $order) {
				$orderTag = $orderTagModel->getTagByOrderId($order->id);
				$point = compare_tag($tags, $orderTag);
				if ($point >= 50) {
					$price += $order->price * $order->vote;
					$count += 1 * $order->vote;
				}
			}
			$price = round($price / $count);
		}
		return response()->json(['priceSuggest'=>$price, 'priceMax'=>$price_max, 'priceMin'=>$price_min]);
	}
}
