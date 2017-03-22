<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Stock;
use App\Models\StockImage;
use App\Http\Requests\StockRequest;

use Input;
class StockController extends Controller
{
    public function getAdd () {
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.stock.add',compact('cate'));
    }

    public function postAdd (StockRequest $stock_request) {
    	$file_name = $stock_request->file('fImages')->getClientOriginalName();

    	$stock = new Stock();
    	$stock->name = $stock_request->txtName;
    	$stock->price = $stock_request->txtPrice;
    	$stock->status = $stock_request->rdoStatus;
    	$stock->description = $stock_request->description;
    	$stock->place = $stock_request->txtPlace;
    	$stock->img = $file_name;
    	$stock->user_id = 1;
    	$stock->cate_id = $stock_request->sltParent;
    	$stock_request->file('fImages')->move('resources/upload/stock',$file_name);
    	$stock->save();
    	$stock_id = $stock->id;
    	if (Input::hasFile('fStockDetail')) {
    		foreach (Input::file('fStockDetail') as $file) {
    			$stock_img = new StockImage();
    			if (isset($file)) {
    				$stock_img->image = $file->getClientOriginalName();
    				$stock_img->stock_id = $stock_id;
    				$file->move('resources/upload/stock/detail',$file->getClientOriginalName());
    				$stock_img->save();
    			}
    		}
    	}
    }
}
