<?php

namespace App\Http\Controllers\Client;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpRequest;
use App\Http\Requests\UpdateProfileRequest;
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
use App\Models\StockNotification;
use App\Models\OrderNotification;
use App\Models\District;
use App\Models\Match;
use Illuminate\Support\Facades\File;
//use Illuminate\Http\File;
use LRedis;
class ClientController extends Controller
{
    public function test() {
        
    }

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
            $message = ['flash_level'=>'danger message-custom','flash_message'=>'Thiếu thông tin người dùng.'];
            return redirect()->route('profile',$author->username)->with($message);
        }
        else {
            $stockNumber = $author->unfinStock()->count();
            $orderNumber = $author->unfinOrder()->count();
            $totalPost = $stockNumber + $orderNumber;
            $limit = $author->level * 5 + 5;
            if ($totalPost >= $limit) {
                $message = ['flash_level'=>'danger message-custom','flash_message'=>'Không thể đăng nhiều hơn '.$limit.' tin.'];
                return redirect()->route('MyStore')->with($message);
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
        $img_main = stripUnicode($img_main);
//        dd($img_main);
        $img_main = 'main-'.$img_main;
        $cate_parent = $_POST['prtcate'];

        $userModel = new User();
        $author = $userModel->getDetailUserByUserID(Auth::id());
        $totalPost = $author->unfinStock()->count() + $author->unfinOrder()->count();
        $limit = $author->level * 5 + 5;
        if ($totalPost >= $limit) {
            $message = ['flash_level'=>'danger message-custom','flash_message'=>'Không thể đăng nhiều hơn '.$limit.' tin.'];
            return redirect()->route('MyStore')->with($message);
        }

        if ($cate_parent == 'stock') {
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
            $type_up = 'stock';
            $info_up = $stock;
            $root_dir = base_path().'/resources/upload/stocks/stock-'.$stock_id;
            if(!File::exists($root_dir)) {
                // path does not exist
                File::makeDirectory($root_dir, 0777, true, true);
            }
            $request->file('image-main')->move($root_dir, $img_main);

            //Stock_image
            $img_details = [];
            $img_detail_1 = $request->file('image-detail-1')->getClientOriginalName();
            $img_detail_1 = stripUnicode($img_detail_1);

            $img_detail_2 = $request->file('image-detail-2')->getClientOriginalName();
            $img_detail_2 = stripUnicode($img_detail_2);

            $img_detail_3 = $request->file('image-detail-3')->getClientOriginalName();
            $img_detail_3 = stripUnicode($img_detail_3);

            $img_details['image-detail-1'] =  'detail-'.$img_detail_1;
            $img_details['image-detail-2'] =  'detail-'.$img_detail_2;
            $img_details['image-detail-3'] =  'detail-'.$img_detail_3;

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
            $checkTags = array_map(function ($str) {return strtolower($str);}, $tags);
            $tagModel = new Tag();
            for ($i = 0; $i < count($tags); $i++) {
                if (($tags[$i] != '')&&($tags[$i] != ' ')) {
                    $check = array_search(strtolower($tags[$i]), $checkTags);
                    if ($i > $check) {
                        continue;
                    }
                    else {
                        $tempTag = $tagModel->getTagByAlias(changeTitle($tags[$i]));
                        if ($tempTag == NULL) {
                            $tag = new Tag();
                            $tag->name = $tags[$i];
                            $tag->alias = changeTitle($tags[$i]);
                            $tag->save();
                            $tempTag = $tag;
                        }
                        $stockTag = new StockTag();
                        $stockTag->stock_id = $stock_id;
                        $stockTag->tag_id = $tempTag->id;
                        $stockTag->save();
                    }
                }
            }

            //Matching
            $result_data = matchSearching($stock,'orders');
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
            $type_up = 'order';
            $info_up = $order;
            $root_dir = base_path().'/resources/upload/orders/order-'.$order_id;
            if(!File::exists($root_dir)) {
                // path does not exist
                File::makeDirectory($root_dir, 0777, true, true);
            }
            $request->file('image-main')->move($root_dir, $img_main);

            //Order_image
            $img_details = [];
            $img_detail_1 = $request->file('image-detail-1')->getClientOriginalName();
            $img_detail_1 = stripUnicode($img_detail_1);

            $img_detail_2 = $request->file('image-detail-2')->getClientOriginalName();
            $img_detail_2 = stripUnicode($img_detail_2);

            $img_detail_3 = $request->file('image-detail-3')->getClientOriginalName();
            $img_detail_3 = stripUnicode($img_detail_3);

            $img_details['image-detail-1'] =  'detail-'.$img_detail_1;
            $img_details['image-detail-2'] =  'detail-'.$img_detail_2;
            $img_details['image-detail-3'] =  'detail-'.$img_detail_3;

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
            $checkTags = array_map(function ($str) {return strtolower($str);}, $tags);
            $tagModel = new Tag();
            for ($i = 0; $i < count($tags); $i++) {
                if (($tags[$i] != '')&&($tags[$i] != ' ')) {
                    $check = array_search(strtolower($tags[$i]), $checkTags);
                    if ($i > $check) {
                        continue;
                    }
                    else {
                        $tempTag = $tagModel->getTagByAlias(changeTitle($tags[$i]));
                        if ($tempTag == NULL) {
                            $tag = new Tag();
                            $tag->name = $tags[$i];
                            $tag->alias = changeTitle($tags[$i]);
                            $tag->save();
                            $tempTag = $tag;
                        }
                        $orderTag = new OrderTag();
                        $orderTag->order_id = $order_id;
                        $orderTag->tag_id = $tempTag->id;
                        $orderTag->save();
                    }
                }
            }

            //Matching
            $result_data = matchSearching($order,'stocks');
        }

        $type = $result_data['type_match'];
        $result_matching = $result_data['matching'];
//        var_dump($result_matching);
        $stockNotification = new StockNotification();
        $orderNotification = new OrderNotification();
        $type_noti = 'matching';
        if (sizeof($result_matching) != 0) {
            foreach ($result_matching as $result_match) {
                if ($type == 'order') {
                    $order_id_match = $result_match->id;
                    $user_id_order = $result_match->user_id;
                    $stock_id_match = $stock_id;
                    $user_id_stock = Auth::id();
                }
                else {
                    $order_id_match = $order_id;
                    $user_id_order = Auth::id();
                    $stock_id_match = $result_match->id;
                    $user_id_stock = $result_match->user_id;
                }
                $stockNotification->createNewStockNotification($stock_id_match, $user_id_stock, $type_noti);
                $orderNotification->createNewOrderNotification($order_id_match, $user_id_order, $type_noti);
                $stockNotiNoRead = $stockNotification->getAllStockNotificationNoRead($result_match->user_id);
                $stockNotiNoRead = sizeof($stockNotiNoRead);
                $orderNotiNoRead = $orderNotification->getAllOrderNotificationNoRead($result_match->user_id);
                $orderNotiNoRead = sizeof($orderNotiNoRead);
                $totalNoti = $stockNotiNoRead + $orderNotiNoRead;
                $redis = LRedis::connection();
                $redis->publish('notification', json_encode(['type' => $type, 'result_match' => $result_match, 'type_noti' => $type_noti , 'totalNoti' => $totalNoti]));
            }
        }
        // dd($result_matching);
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
            // $directory = base_path().'/resources/upload/'.$state.'s/'.$state.'-' .$id;
            // File::cleanDirectory($directory);
            // File::deleteDirectory($directory);
            $productName = $product->name;
            $product->getFinished();
            $message = ['flash_level'=>'success message-custom','flash_message'=>'Xóa '.$productName.' thành công.'];
        }
        else {
            $message = ['flash_level'=>'danger message-custom','flash_message'=>'Bạn không phải là chủ tin này.'];
        }
        return redirect()->route('MyStore')->with($message);
    }

    //Show detail profile ---- Anh Pham
    public function profileDetail($user_name) {
        $userModel = new User();
        $data = $userModel->getDetailUserByUserName($user_name);
//        dd($data);
        $reviewModel = new Review();
        $review = $reviewModel->getReviewInfo($data->id);
        $vote = $reviewModel->getAverageVote($data->id);
        //$guestModel = new User();
        //$guest = $guestModel->getDetailUserByUserID($review->voting_user_id);
        //dd($guest);
        return view('haiblade.pages.profile', compact('data','review','userModel','vote'));
    }

    public function postProfile($user_id, UpdateProfileRequest $request) {
        $userModel = new User();
        $data = $userModel->getDetailUserByUserId($user_id);

        $temp = User::where('username','=',$request->username)->value('id');
        if (($temp == $user_id)||($temp == NULL)) {
            $data->username = $request->username;
            $data->fullname = $request->fullname;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if (isset($request->avatar)) {
                $img_name_reverse = array_reverse(explode('.',$_FILES['avatar']['name']));
                $root_dir = base_path().'/resources/upload/user/';
                if ($data->avatar != 'default_avatar.png') {
                    $temp_path = $root_dir.$data->avatar;
                    unlink($temp_path);
                }
                $img_avatar = $data->id.'_'.changeTitle($data->username).'.'.$img_name_reverse[0];
                $data->avatar = $img_avatar;
                $request->file('avatar')->move($root_dir, $img_avatar);
            }

            $data->save();
            $message = ['flash_level'=>'success message-custom','flash_message'=>'Sửa thông tin thành công.'];
        }
        else {
            $message = ['flash_level'=>'danger message-custom','flash_message'=>'Nickname đã có người sử dụng.'];
        }
        return redirect()->Route('profile', $data->username)->with($message);
    }
}
