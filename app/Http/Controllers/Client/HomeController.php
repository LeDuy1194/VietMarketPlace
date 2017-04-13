<?php namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Stock;
use App\Models\StockImage;
use App\Models\Order;
use App\Models\OrderImage;
use App\Models\Cate;
use App\Models\User;
use App\Models\Fav;
use App\Models\FavO;
use App\Models\Review;
use App\Models\Match;
use Auth;

class HomeController extends Controller {
    //
    public function init_db() {
        // for ($i = 1; $i <= 20; $i++) {
        //     $stock = new Stock;
        //     $stock->name = "Item ".$i;
        //     $stock->price = $i * 1000;
        //     $stock->status = "new";
        //     $stock->description = "describe ".$i;
        //     $stock->place = "place ".$i;
        //     $stock->img = "stock_image.png";
        //     $stock->user_id = 1;
        //     $stock->cate_id = mt_rand(1,6);
        //     $stock->save();

        //     $order = new Order;
        //     $order->name = "Đơn hàng ".$i;
        //     $order->price = $i * 1000;
        //     $order->status = "new";
        //     $order->description = "describe ".$i;
        //     $order->place = "place ".$i;
        //     $order->img = "order_image.jpg";
        //     $order->user_id = 1;
        //     $order->cate_id = mt_rand(1,6);
        //     $order->save();
        // }
        echo "Đã tạo";
    }

    public function showHome() {
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $stockModel = new Stock();
        $stock = $stockModel->getNewest(8);
        $orderModel = new Order();
        $order = $orderModel->getNewest(8);
        return view('pages.home',compact('stock','order','userModel','cateModel','favModel'));
    }

    public function listByCate($id,$state) {
        $number = 5;
        $cateModel = new Cate();
        $userModel = new User();
        $favModel = new Fav();
        $stockModel = new Stock();
        $orderModel = new Order();
        if ($id != 0) {
            $stock = $stockModel->getStockByCateId($id,$number);
            $order = $orderModel->getOrderByCateId($id,$number);
        }
        else {
            $stock = $stockModel->getPage($number);
            $order = $orderModel->getPage($number);
        }
        return view('pages.listProduct',compact('stock','order','id','state','userModel','cateModel','favModel'));
    }

    public function showOrderDetail($id) {
        $data = Order::find($id);
        $cate = Cate::find($data['cate_id']);
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID($data['user_id']);
        $orderImageModel = new OrderImage();
        $orderImages = $orderImageModel->getImages($id);
        return view('pages.listOrder',compact('data','cate','author','orderImages'));
    }

    public function showStockDetail($id) {
        $data = Stock::find($id);
        $cate = Cate::find($data['cate_id']);
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID($data['user_id']);
        $stockImageModel = new StockImage();
        $stockImages = $stockImageModel->getImages($id);
        return view('pages.listStock',compact('data','cate', 'author', 'stockImages'));
    }

    public function postReview($id, ReviewRequest $request)
    {
        $data = Stock::find($id);
        $cate = Cate::find($data['cate_id']);
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID($data['user_id']);
        $guestModel = new User();
        $guest = $guestModel->getDetailUserByUserID(Auth::id());
        $review = new Review();
        $review->voting_user_id = $guest->id;
        $review->voted_user_id = $author->id;
        $review->vote = $_POST['vote'];
        $review->comment = $request->comment;
        $review->save();
        $stockImageModel = new StockImage();
        $stockImages = $stockImageModel->getImages($id);
        return view('pages.listStock',compact('data','cate', 'author', 'stockImages'));
    }

    public function showMyStore($state) {
        $number = 5;
        $userModel = new User();
        $cateModel = new Cate();
        $matchModel = new Match();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $stock = $author->stock;
        $order = $author->order;
        return view('pages.myStore',compact('stock','order','state','author','cateModel','userModel','matchModel'));
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

    public function changeFavorite($state,$id) {
        if (Auth::check()) {
            if ($state == 'stock') {
                $check = Stock::find($id);
                if ($check != NULL) {
                    $favModel = new Fav();
                    $fav = $favModel->getFav(Auth::id(),$id);
                    if ($fav != NULL) {
                        $fav->delete();
                        $message = ['flash_level'=>'danger','flash_message'=>'Unlike S '.$check->name.' .'];
                    }
                    else {
                        $fav = new Fav();
                        $fav->user_id = Auth::id();
                        $fav->stock_id = $id;
                        $fav->save();
                        $message = ['flash_level'=>'danger','flash_message'=>'Like S '.$check->name.' .'];
                    }
                }
                else {
                    $message = ['flash_level'=>'danger','flash_message'=>'Sản phẩm không tồn tại.'];
                }
            }
            else {
                $check = Order::find($id);
                if ($check != NULL) {
                    $favModel = new FavO();
                    $fav = $favModel->getFav(Auth::id(),$id);
                    if ($fav != NULL) {
                        $fav->delete();
                        $message = ['flash_level'=>'danger','flash_message'=>'Unlike O '.$check->name.' .'];
                    }
                    else {
                        $fav = new FavO();
                        $fav->user_id = Auth::id();
                        $fav->order_id = $id;
                        $fav->save();
                        $message = ['flash_level'=>'danger','flash_message'=>'Like O '.$check->name.' .'];
                    }
                }
                else {
                    $message = ['flash_level'=>'danger','flash_message'=>'Sản phẩm không tồn tại.'];
                }
            }
        }
        else {
            $message = ['flash_level'=>'danger','flash_message'=>'Đăng nhập để thêm vào yêu thích.'];
        }
        return back()->with($message);
    }

    public function showMark() {
        $number = 5;
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $favOMode = new FavO();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $fav = $favModel->getFavByUser($author->id,$number);
        $favO = $favOMode->getFavByUser($author->id,$number);
        return view('pages.myMark',compact('fav','favO','cateModel','userModel'));
    }
}
