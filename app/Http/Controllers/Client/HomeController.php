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
    public function showHome() {
        $stock = Stock::all();
        $order = Order::all();
        return view('pages.home',compact('stock','order'));
    }

    public function showMyStore() {
        $stock = Stock::where('user_id',Auth::user()->id)->get();
        $order = Order::where('user_id',Auth::user()->id)->get();
        return view('pages.myStore');
    }

    public function showOrderDetail() {
        return view('pages.listOrder');
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
        $stock = Stock::where('cate_id',$cate_id)->orderBy('id','desc')->get();
        $order = Order::where('cate_id',$cate_id)->orderBy('id','desc')->get();
        return ;
    }
}
