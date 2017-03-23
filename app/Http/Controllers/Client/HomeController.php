<?php namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockImage;
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
        echo "<h1>Testing</h1>";
    }


    public function showHome() {
        $userModel = new User();
        $stockModel = new Stock();
        $stock = $stockModel->getNewest(5);
        $orderModel = new Order();
        $order = $orderModel->getNewest(5);
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
        $stockImageModel = new StockImage();
        $stockImages = $stockImageModel->getImages($id);
//        dd($stockImages);
        return view('pages.listStock',compact('data','cate', 'author', 'stockImages'));
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

    public function listByCate($id) {
        $userModel = new User();
        $stockModel = new Stock();
        $orderModel = new Order();
        if ($id != 0) {
            $cate = Cate::find($id);
            $stock = $stockModel->getStockByCateId($id);
            $order = $orderModel->getOrderByCateId($id);
        }
        else {
            $cate = new Cate();
            $stock = Stock::all();
            $order = Order::all();
        }
        return view('pages.listProduct',compact('stock','order','cate','state','userModel'));
    }
}
