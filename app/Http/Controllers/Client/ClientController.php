<?php

namespace App\Http\Controllers\Client;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpRequest;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\StockImage;
use App\Models\OrderImage;
use App\Models\Tag;
use App\Models\StockTag;
use App\Models\OrderTag;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\Match;
use Illuminate\Support\Facades\File;
//use Illuminate\Http\File;
class ClientController extends Controller
{
    public function getUpload() {
        $cate = Cate::select('name','id')->get()->toArray();
        $city = City::select('name','cityid')->get()->toArray();
        $district = District::select('name','cityid')->get()->toArray();
        $tag = Tag::select('id','name')->get()->toArray();
        //$dtModel = new District();
        //$district = $dtModel->getDistrictByCityId($city->cityid);

        // Restrict Upload -- LeDuy
        $userModel = new User();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        if (($author->phone == NULL)||($author->fullname == NULL)) {
            $message = ['flash_level'=>'danger','flash_message'=>'Thiếu thông tin người dùng.'];
            return redirect()->route('profile',$author->username)->with($message);
        }
        else {
            $stockNumber = $author->stock()->count();
            $orderNumber = $author->order()->count();
            $totalPost = $stockNumber + $orderNumber;
            $limit = $author->level * 5 + 5;
            if ($totalPost >= $limit) {
                $message = ['flash_level'=>'danger','flash_message'=>'Không thể đăng nhiều hơn '.$limit.' tin.'];
                return redirect()->route('MyStore','stock')->with($message);
            }
            else {
                return view('haiblade.pages.upload',compact('cate','city','district','tag'));
            }
        }
    }

    /**
     * @param ClientUpRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpload(ClientUpRequest $request) {
        $user_id = Auth::id();
        $img_main = $request->file('image-main')->getClientOriginalName();
        $img_main = 'main-' . $img_main;
        $cate_parent = $_POST['prtcate'];
        if ($cate_parent == 'Kho Hàng') {
            // Stock
            $stock = new Stock();
            $stock->name = $request->itemname;
            $stock->price = $request->price;
            $stock->status = $_POST['status'];
            $stock->description = $request->discription;
            $stock->place = $request->address;
            $stock->city = $request->ct;
            $stock->district = $request->dt;
            $stock->lat = $request->lat;
            $stock->lng = $request->lng;
            $stock->img = $img_main;
            $stock->user_id = $user_id;
            $stock->cate_id = $_POST['cate'];
            $stock->save();

            $stock_id = $stock->id;
            $root_dir = base_path() . '/resources/upload/stocks/stock-' . $stock_id;
            if(!File::exists($root_dir)) {
                // path does not exist
                File::makeDirectory($root_dir, 0777, true, true);
            }
            $request->file('image-main')->move($root_dir, $img_main);

            //Stock_image
            $img_details = [];
            $img_detail_1 = $request->file('image-detail-1')->getClientOriginalName();
            $img_detail_2 = $request->file('image-detail-2')->getClientOriginalName();
            $img_detail_3 = $request->file('image-detail-3')->getClientOriginalName();
            $img_details['image-detail-1'] =  'detail-' . $img_detail_1;
            $img_details['image-detail-2'] =  'detail-' . $img_detail_2;
            $img_details['image-detail-3'] =  'detail-' . $img_detail_3;

            foreach ($img_details as $key => $img_detail) {
                $stock_img = new StockImage();
                $stock_img->stock_id = $stock_id;
                $stock_img->image = $img_detail;
                $request->file($key)->move($root_dir, $img_detail);
                $stock_img->save();
                $stock_img->save();
            }

            //Tag
            $tags = explode(',', $request->tags);
            $tagModel = new Tag();
            foreach ($tags as $tagName) {
                if (($tagName != '')&&($tagName != ' ')) {
                    $tempTag = $tagModel->getTagByAlias(changeTitle($tagName));
                    if ($tempTag == NULL) {
                        $tag = new Tag();
                        $tag->name = $tagName;
                        $tag->alias = changeTitle($tagName);
                        $tag->save();
                        $tempTag = $tag;
                    }
                    $stockTag = new StockTag();
                    $stockTag->stock_id = $stock_id;
                    $stockTag->tag_id = $tempTag->id;
                    $stockTag->save();
                }
            }

            //Matching
            match_searching($stock,'orders');
        }
        else {
            // Order
            $order = new Order();
            $order->name = $request->itemname;
            $order->price = $request->price;
            $order->status = $_POST['status'];
            $order->description = $request->discription;
            $order->place = $request->address;
            $order->city = $request->ct;
            $order->district = $request->dt;
            $order->lat = $request->lat;
            $order->lng = $request->lng;
            $order->img = $img_main;
            $order->user_id = $user_id;
            $order->cate_id = $_POST['cate'];
            $order->save();

            $order_id = $order->id;
            $root_dir = base_path() . '/resources/upload/orders/order-' . $order_id;
            if(!File::exists($root_dir)) {
                // path does not exist
                File::makeDirectory($root_dir, 0777, true, true);
            }
            $request->file('image-main')->move($root_dir, $img_main);

            //Order_image
            $img_details = [];
            $img_detail_1 = $request->file('image-detail-1')->getClientOriginalName();
            $img_detail_2 = $request->file('image-detail-2')->getClientOriginalName();
            $img_detail_3 = $request->file('image-detail-3')->getClientOriginalName();
            $img_details['image-detail-1'] =  'detail-' . $img_detail_1;
            $img_details['image-detail-2'] =  'detail-' . $img_detail_2;
            $img_details['image-detail-3'] =  'detail-' . $img_detail_3;

            foreach ($img_details as $key => $img_detail) {
                $order_img = new OrderImage();
                $order_img->order_id = $order_id;
                $order_img->image = $img_detail;
                $request->file($key)->move($root_dir, $img_detail);
                $order_img->save();
                $order_img->save();
            }

            //Tag
            $tags = explode(',', $request->tags);
            $tagModel = new Tag();
            foreach ($tags as $tagName) {
                if (($tagName != '')&&($tagName != ' ')) {
                    $tempTag = $tagModel->getTagByAlias(changeTitle($tagName));
                    if ($tempTag == NULL) {
                        $tag = new Tag();
                        $tag->name = $tagName;
                        $tag->alias = changeTitle($tagName);
                        $tag->save();
                        $tempTag = $tag;
                    }
                    $orderTag = new OrderTag();
                    $orderTag->order_id = $order_id;
                    $orderTag->tag_id = $tempTag->id;
                    $orderTag->save();
                }
            }

            //Matching
            match_searching($order,'stocks');
        }
        // After
        return redirect()->route('Home');
    }

    //Delete product --- Le Duy
    public function getDeleteProduct($state,$id) {
        if ($state == 'stock') {
            $product = Stock::find($id);
        }
        else {
            $product = Order::find($id);
        }
        if (Auth::id() == $product->user_id) {
            $directory = base_path() . '/resources/upload/'.$state.'s/'.$state.'-' .$id;
            File::cleanDirectory($directory);
            File::deleteDirectory($directory);
            $productName = $product->name;
            $product->delete();
            $message = ['flash_level'=>'success','flash_message'=>'Xóa '.$productName.' thành công.'];
        }
        else {
            $message = ['flash_level'=>'danger','flash_message'=>'Bạn không phải là chủ tin này.'];
        }
        return redirect()->route('MyStore',$state)->with($message);
    }

    //Show detail profile ---- Anh Pham
    public function profileDetail($user_name) {
        $userModel = new User();
        $data = $userModel->getDetailUserByUserName($user_name);
        $reviewModel = new Review();
        $review = $reviewModel->getReviewInfo($data->id);
        $vote = $reviewModel->getAverageVote($data->id);
        //$guestModel = new User();
        //$guest = $guestModel->getDetailUserByUserID($review->voting_user_id);
        //dd($guest);
        return view('haiblade.pages.profile', compact('data','review','userModel','vote'));
    }
    /*public function postProfile($user_name, Request $request) {
        $userModel = new User();
        $data = $userModel->getDetailUserByUserName($user_name);

        $data->fullname = $request->fullname;
        $data->username = $request->nickname;
        $data->phone = $request->sdt;
        $data->address = $request->address;
        $data->save();
        return redirect()->Route('profile');
    }*/
}
