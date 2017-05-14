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
use App\Services\productLocation;
use App\Models\Match;
use Auth;

class HomeController extends Controller {
    //
    public function showHome() {
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $stockModel = new Stock();
        $reviewModel = new Review();
        $stock = $stockModel->getNewest(8);
        $orderModel = new Order();
        $order = $orderModel->getNewest(8);
        return view('pages.home',compact('stock','order','userModel','cateModel','favModel','reviewModel'));
    }

    public function listByCate($id,$state) {
        $number = 5;
        $cateModel = new Cate();
        $userModel = new User();
        $favModel = new Fav();
        $stockModel = new Stock();
        $orderModel = new Order();
        $reviewModel = new Review();
        if ($id != 0) {
            $stock = $stockModel->getStockByCateId($id,$number);
            $order = $orderModel->getOrderByCateId($id,$number);
        }
        else {
            $stock = $stockModel->getPage($number);
            $order = $orderModel->getPage($number);
        }
        return view('pages.listProduct',compact('stock','order','id','state','userModel','cateModel','favModel','reviewModel'));
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

    public function postReview($id, ReviewRequest $request) {
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

    public function showMyStore() {
        $number = 5;
        $userModel = new User();
        $cateModel = new Cate();
        $matchModel = new Match();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $stock = $author->stock;
        $order = $author->order;
        return view('pages.myStore',compact('stock','order','author','cateModel','userModel','matchModel'));
    }

    public function showMap() {
        $mapStock = new Stock();
        $mapOrder = new Order();
        //$stockProducts = $mapStock->getAllStock();
        //$orderProducts = $mapOrder->getAllOrder();
        //$productLocations = new productLocation();
        $productStock = $mapStock->getAllStock();
        $productOrder = $mapOrder->getAllOrder();
        //dd($orderProduct);
        return view('haiblade.pages.map', compact('productStock','productOrder'));
    }

    public function changeFavorite($state,$id) {
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
        return back()->with($message);
    }

    public function showMark() {
        $number = 5;
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $favOMode = new FavO();
        $reviewModel = new Review();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $fav = $favModel->getFavByUser($author->id,$number);
        $favO = $favOMode->getFavByUser($author->id,$number);
        return view('pages.myMark',compact('fav','favO','cateModel','userModel','reviewModel'));
    }

    public function getMatch($state,$id) {
        $number = 10;
        $matchModel = new Match();
        $cateModel = new Cate();
        $userModel = new User();
        $reviewModel = new Review();
        if ($state=='stock') {
            $base = Stock::findOrFail($id);
            $data = $matchModel->getOrderByStockId($id,$number);
        }
        else {
            $base = Order::findOrFail($id);
            $data = $matchModel->getStockByOrderId($id,$number);
        }
        return view('pages.match',compact('base','data','state','cateModel','userModel','reviewModel'));
    }
}
