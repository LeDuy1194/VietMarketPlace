<?php namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
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
use Request;

class HomeController extends Controller {
    //
    public function showHome() {
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $favOModel = new FavO();
        $stockModel = new Stock();
        $reviewModel = new Review();
        $stock = $stockModel->getNewest(8);
        $orderModel = new Order();
        $order = $orderModel->getNewest(8);
        if (Auth::check()) {
            $author = $userModel->getDetailUserByUserID(Auth::id());
        }
        else {
            $author = NULL;
        }
        return view('pages.home',compact('stock','order','author','userModel','cateModel','favModel','favOModel','reviewModel'));
    }

    public function listByCate($id) {
        $number = 12;
        $cateModel = new Cate();
        $userModel = new User();
        $favModel = new Fav();
        $favOModel = new FavO();
        $stockModel = new Stock();
        $orderModel = new Order();
        $reviewModel = new Review();
        if ($id != 0) {
            $stock = $stockModel->getStockByCateId($id,$number);
            $order = $orderModel->getOrderByCateId($id,$number);
            if ($stock->lastPage() == 0) {
                return abort(404);
            }
        }
        else {
            $stock = $stockModel->getPage($number);
            $order = $orderModel->getPage($number);
        }
        if (Auth::check()) {
            $author = $userModel->getDetailUserByUserID(Auth::id());
        }
        else {
            $author = NULL;
        }
        return view('pages.listProduct',compact('stock','order','author','id','userModel','cateModel','favModel','favOModel','reviewModel'));
    }

    public function showOrderDetail($id) {
        $data = Order::findOrFail($id);
        if ($data) {
            if ($data['finished'] == 0) {
                $cate = Cate::find($data['cate_id']);
                $userModel = new User();
                $author = $userModel->getDetailUserByUserID($data['user_id']);
                $orderImageModel = new OrderImage();
                $orderImages = $orderImageModel->getImages($id);
                return view('pages.listOrder',compact('data','cate','author','orderImages'));
            }
            else return abort(404);
        }
        else return abort(404);
    }

    public function showStockDetail($id) {
        $data = Stock::findOrFail($id);
        if ($data) {
            if ($data['finished'] == 0) {
                $cate = Cate::find($data['cate_id']);
                $userModel = new User();
                $author = $userModel->getDetailUserByUserID($data['user_id']);
                $stockImageModel = new StockImage();
                $stockImages = $stockImageModel->getImages($id);
                return view('pages.listStock', compact('data', 'cate', 'author', 'stockImages'));
            }
            else return abort(404);
        }
        else return abort(404);
    }

    public function postReview($id, ReviewRequest $request) {
        if ($_POST['parentCt'] == 'stock') {
            $data = Stock::findOrFail($id);
        }
        else {
            $data = Order::findOrFail($id);
        }
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
        $userModel = new User();
        $cateModel = new Cate();
        $matchModel = new Match();
        $reviewModel = new Review();
        $favModel = new Fav();
        $favOModel = new FavO();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $stock = $author->unfinStock();
        $order = $author->unfinOrder();
        return view('pages.myStore',compact('stock','order','author','cateModel','userModel','matchModel', 'favModel','favOModel', 'reviewModel'));
    }

    public function showMap() {
        $mapStock = new Stock();
        $mapOrder = new Order();
        $productStock = $mapStock->getAllStock();
        $productOrder = $mapOrder->getAllOrder();
        $userModel = new User();
        $cateModel = new Cate();
        $reviewModel = new Review();
        if (Auth::check()) {
            $author = $userModel->getDetailUserByUserID(Auth::id());
        }
        else {
            $author = NULL;
        }

        //dd($orderProduct);
        return view('haiblade.pages.map', compact('productStock','productOrder', 'author','userModel','cateModel','reviewModel'));
    }

    public function showMapStockInfoDetail($id) {
        if (Request::ajax()) {
            $data = Stock::findOrFail($id);
            $price = number_format($data->price,0,",",".");
            $userModel = new User();
            $author = $userModel->getDetailUserByUserID($data['user_id']);
            return json_encode(['author' => $author, 'price' => $price]);
        }
    }

    public function showMapOrderInfoDetail($id) {
        if (Request::ajax()) {
            $data = Order::findOrFail($id);
            $price = number_format($data->price,0,",",".");
            $userModel = new User();
            $author = $userModel->getDetailUserByUserID($data['user_id']);
            return json_encode(['author' => $author, 'price' => $price]);
        }
    }

    public function changeFavorite($state,$id) {
        if ($state == 'stock') {
            $check = Stock::find($id);
            if ($check != NULL) {
                $favModel = new Fav();
                $fav = $favModel->getFav(Auth::id(),$id);
                if ($fav != NULL) {
                    $fav->delete();
                    $message = ['flash_level'=>'danger message-custom','flash_message'=>'Unlike S '.$check->name.' .'];
                }
                else {
                    $fav = new Fav();
                    $fav->user_id = Auth::id();
                    $fav->stock_id = $id;
                    $fav->save();
                    $message = ['flash_level'=>'danger message-custom','flash_message'=>'Like S '.$check->name.' .'];
                }
            }
            else {
                $message = ['flash_level'=>'danger message-custom','flash_message'=>'Sản phẩm không tồn tại.'];
            }
        }
        else {
            $check = Order::find($id);
            if ($check != NULL) {
                $favModel = new FavO();
                $fav = $favModel->getFav(Auth::id(),$id);
                if ($fav != NULL) {
                    $fav->delete();
                    $message = ['flash_level'=>'danger message-custom','flash_message'=>'Unlike O '.$check->name.' .'];
                }
                else {
                    $fav = new FavO();
                    $fav->user_id = Auth::id();
                    $fav->order_id = $id;
                    $fav->save();
                    $message = ['flash_level'=>'danger message-custom','flash_message'=>'Like O '.$check->name.' .'];
                }
            }
            else {
                $message = ['flash_level'=>'danger message-custom','flash_message'=>'Sản phẩm không tồn tại.'];
            }
        }
        return back()->with($message);
    }

    public function showMark() {
        $number = 5;
        $userModel = new User();
        $cateModel = new Cate();
        $favModel = new Fav();
        $favOModel = new FavO();
        $reviewModel = new Review();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $fav = $favModel->getFavByUser($author->id,$number);
        $favO = $favOModel->getFavByUser($author->id,$number);
        return view('pages.myMark',compact('fav','favO','cateModel','userModel','reviewModel'));
    }

    public function getMatch($state,$id) {
        $number = 10;
        $matchModel = new Match();
        $cateModel = new Cate();
        $userModel = new User();
        $reviewModel = new Review();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        if ($state=='stock') {
            $base = Stock::findOrFail($id);
            $data = $matchModel->getOrderByStockId($id,$number);
            $favModel = new FavO();
        }
        else {
            $base = Order::findOrFail($id);
            $data = $matchModel->getStockByOrderId($id,$number);
            $favModel = new Fav();
        }
        return view('pages.match',compact('base','data','state','author','cateModel','userModel','reviewModel','favModel'));
    }
}
