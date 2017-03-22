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
        for ($i = 1; $i <= 20; $i++) {
            $stock = new Stock;
            $stock->name = "Item ".$i;
            $stock->price = $i * 1000;
            $stock->status = "new";
            $stock->description = "describe ".$i;
            $stock->place = "place ".$i;
            $stock->img = "stock_image.png";
            $stock->user_id = 1;
            $stock->cate_id = mt_rand(1,6);
            $stock->save();

            $order = new Order;
            $order->name = "Đơn hàng ".$i;
            $order->priceMax = $i * 1000;
            $order->status = "new";
            $order->description = "describe ".$i;
            $order->place = "place ".$i;
            $order->img = "order_image.jpg";
            $order->user_id = 1;
            $order->cate_id = mt_rand(1,6);
            $order->save();
        }
        echo "Đã tạo";
    }

    public function test() {
        $userModel = new User();
        $user = $userModel->getDetailUserByUserID(Auth::id());
        $stock = $user->stock->toArray();
        var_dump($stock);
    }


    public function showHome() {
        $userModel = new User();
        $stock = Stock::orderBy('id','desc')->take(5)->get();
        $order = Order::where('finished',0)->orderBy('id','desc')->take(5)->get();
        return view('pages.home',compact('stock','order','userModel'));
    }

    public function showMyStore($state) {
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $stock = $author->stock;
        $order = $author->order;
        return view('pages.myStore',compact('stock','order','state','author'));
    }

    public function showOrderDetail($id) {
        $data = Order::find($id);
        $cate = Cate::find($data['cate_id']);
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID($data['user_id']);
        return view('pages.listOrder',compact('data','cate','author'));
    }

    public function showStockDetail($id) {
        $data = Stock::find($id);
        $cate = Cate::find($data['cate_id']);
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID($data['user_id']);
        return view('pages.listStock',compact('data','cate', 'author'));
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
        return view('pages.home',compact('stock','order'));
    }
}
