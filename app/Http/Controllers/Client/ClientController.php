<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpRequest;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\StockImage;
use App\Models\OrderImage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ClientController extends Controller
{
    public function getUpload() {
    	$cate = Cate::select('name','id')->get()->toArray();
    	return view('haiblade.pages.upload',compact('cate'));
    }

    /**
     * @param ClientUpRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpload(ClientUpRequest $request) {
        $user_id = Auth::id();
        $imgmain = $request->file('imagemain')->getClientOriginalName();
        $stock = new Stock();
        $stock_img = new StockImage();
        // Stock
    	$stock->name = $request->itemname;
    	$stock->price = $request->price;
    	$stock->status = $_POST['status'];
    	$stock->description = $request->discription;
    	$stock->place = $request->address;
    	$stock->img = $imgmain;
    	$stock->user_id = $user_id;
    	$stock->cate_id = $_POST['cate'];
    	$request->file('imagemain')->move('resources/upload',$imgmain);
    	$stock->save();
        $stockid = $stock->id;

        $stock_img->stock_id = $stockid;
        $imgdetail1 = $request->file('imagedetail1')->getClientOriginalName();
        $stock_img->image = $imgdetail1;
        $request->file('imagedetail1')->move('resources/upload/products',$imgdetail1);
        $stock_img->save();

        $stock_img->stock_id = $stockid;
        $imgdetail2 = $request->file('imagedetail2')->getClientOriginalName();
        $stock_img->image = $imgdetail2;
        $request->file('imagedetail2')->move('resources/upload/products',$imgdetail2);
        $stock_img->save();

        $stock_img->stock_id = $stockid;
        $imgdetail3 = $request->file('imagedetail3')->getClientOriginalName();
        $stock_img->image = $imgdetail3;
        $request->file('imagedetail3')->move('resources/upload/products',$imgdetail3);
        $stock_img->save();
    	/*if(Input::hasFile('imagedetail')) {
    		foreach (Input::file('imagedetail') as $file) {
    			if (isset($file)) {
    				$stock_img->image = $file->getClientOriginalName();
    				$stock_img->stock_id = $stock_id;
    				$file->move('resources/upload/stock/detail',$file->getClientOriginalName());
    				$stock_img->save();
    			}
    		}
    	}*/
    	// After
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
