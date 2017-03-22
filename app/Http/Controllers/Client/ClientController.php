<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpRequest;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\StockImage;
use Illuminate\Support\Facades\Auth;
use Input;
use App\Models\User;
class ClientController extends Controller
{
    public function getUpload() {
    	$cate = Cate::select('name','parent_id')->get()->toArray();
    	return view('haiblade.pages.upload',compact('cate'));
    }
    public function postUpload(ClientUpRequest $request) {
        $user_id = Auth::id();
        $file_name = $request->file('imagemain')->getClientOriginalName();
        // Stock
    	$stock = new Stock;
    	$stock->name = $request->itemname;
    	$stock->price = $request->price;
    	$stock->status = $_POST['status'];
    	$stock->description = $request->discription;
    	$stock->place = $request->address;
    	$stock->img = $file_name;
    	$stock->user_id = $user_id;
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
    	// Order
        $order = new Order;
    	return redirect()->route('Home');
    }

    //Show detail profile ---- Anh Pham
    public function profileDetail($user_name) {
        $userModel = new User();
        $data = $userModel->getDetailUserByUserName($user_name);
//        dd($data);
        return view('haiblade.pages.profile', compact('data'));
    }
}
