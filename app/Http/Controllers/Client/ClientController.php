<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpStockRequest;
use App\Models\Stock;
use App\Models\Cate;
use App\Models\StockImage;
use Input;
class ClientController extends Controller
{
    public function getUploadStock() {
    	$cate = Cate::select('name','parent_id')->get()->toArray();
    	return view('haiblade.pages.uploadstock',compact('cate'));
    }
    public function postUploadStock(ClientUpStockRequest $request) {
    	$file_name = $request->file('imagemain')->getClientOriginalName();
    	$stock = new Stock;
    	$stock->name = $request->itemname;
    	$stock->price = $request->price;
    	$stock->status = $request->status;
    	$stock->description = $request->discription;
    	$stock->place = $request->address;
    	$stock->img = $file_name;
    	$stock->user_id = 10;
    	$stock->cate_id = $request->cate;
    	$request->file('imagemain')->move('resources/upload/stock',$file_name);
    	$stock->save();
    	$stock_id = $stock->id;
    	if(Input::hasFile('image')) {
    		foreach (Input::file('image') as $file) {
    			$stock_img = new StockImage();
    			if (isset($file)) {
    				$stock_img->image = $file->getClientOriginalName();
    				$stock_img->stock_id = $stock_id;
    				$file->move('resources/upload/stock/detail',$file->getClientOriginalName());
    				$stock_img->save();
    			}
    		}
    	}
    	return redirect()->route('Home');
    }
}
