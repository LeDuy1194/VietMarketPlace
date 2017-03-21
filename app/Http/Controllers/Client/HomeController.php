<?php namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\User;
use Auth;

class HomeController extends Controller {
    //
    public function init_db() {
        // for ($i = 1; $i <= 20; $i++) {
        //     // $stock = new Stock;
        //     // $stock->name = "Item ".$i;
        //     // $stock->price = $i * 1000;
        //     // $stock->status = "new";
        //     // //$stock->description = "describe ".$i;
        //     // $stock->place = "place ".$i;
        //     // $stock->img = "images.jpg";
        //     // $stock->user_id = 1;
        //     // $stock->cate_id = mt_rand(1,5);
        //     // $stock->save();

        //     $order = new Order;
        //     $order->name = "Đơn hàng ".$i;
        //     $order->priceMax = $i * 1000;
        //     $order->priceMin = 1000;
        //     $order->status = "new";
        //     $order->place = "place ".$i;
        //     $order->img = "images.jpg";
        //     $order->user_id = 1;
        //     $order->cate_id = mt_rand(1,5);
        //     $order->save();
        // }
        echo "Đã tạo";
    }


    public function showHome() {
        $stock = Stock::all()->toArray();
        $order = Order::all()->toArray();
        return view('pages.home',compact('stock','order'));
    }

    public function showMyStore() {
        $stock = Stock::where('user_id',Auth::user()->id)->get()->toArray();
        $order = Order::where('user_id',Auth::user()->id)->get()->toArray();
        return view('pages.myStore',compact('stock','order'));
    }

    public function showOrderDetail($id) {
        $data = Order::find($id)->toArray();
        $cate = Cate::find($data['cate_id'])->toArray();
        return view('pages.listOrder',compact('data','cate'));
    }

    public function showProfile() {
        return view('haiblade.pages.profile');
    }

    public function showUploadStock() {
        return view('haiblade.pages.uploadstock');
    }

    public function showUploadOrder() {
        return view('haiblade.pages.uploadorder');
    }

    public function showMap() {
        return view('haiblade.pages.map');
    }
    public function showLogin() {
        return view('account.pages.login');
    }

    public function showReset() {
        return view('account.pages.reset');
    }

    public function showRegister() {
        return view('account.pages.register');
    }

    public function listByCate($cate,$id,Request $request) {
        $cate_id = Cate::where('name',$cate)->get()->id;
        $stock = Stock::where('cate_id',$cate_id)->orderBy('id','desc')->get()->toArray();
        $order = Order::where('cate_id',$cate_id)->orderBy('id','desc')->get()->toArray();
        return ;
    }
}
