<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\FavO;
use App\Models\Match;

class Order extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = ['name', 'price', 'status', 'description', 'place', 'city', 'district','lat','lng','img', 'user_id', 'cate_id', 'finished'];

    public $timestamps = true;

    public function user() {
    	return $this->belongTo('App\Models\User');
    }

    public function cate() {
    	return $this->belongTo('App\Models\Cate');
    }
    
    public function oimage() {
        return $this->hasMany('App\Models\OrderImage');
    }


    //Get the newest $number unfinished order.
    public function getNewest($number) {
        return $this->where('finished',0)->orderBy('updated_at','desc')->take($number)->get();
    }

    //Get paginate
    public function getPage($number) {
        return $this->where('finished',0)->orderBy('updated_at','desc')->paginate($number,['*'],'order');
    }

    //Get order by cate.
    public function getOrderByCateId($cate_id,$number) {
        return $this->where('finished',0)->where('cate_id',$cate_id)->orderBy('id','desc')->paginate($number,['*'],'order');
    }

    //Get order by user.
    public function getOrderByUserId($user_id) {
        return $this->where('finished',0)->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

    //Get all Product
    public function getAllOrder() {
        return $this->where('finished',0)->get();
    }

    //Search Orders --- Create by Anh Pham
    public function searchOrders($request) {
        $key = $request->search_key;
        $cate = $request->search_cate;
        $status = $request->search_status;
        $order_query = DB::table('orders')->where('name', 'LIKE', '%' . $key . '%');
        if ($cate != '')
        {
            $order_query = $order_query->where('cate_id', $cate);
        }

        if ($status != '')
        {
            $order_query = $order_query->where('status', $status);
        }

        $result = $order_query->where('finished',0)->get();
        return $result;
    }

    //Get admin paginate
    public function getAdminPage($number) {
        return $this->select('id','name','created_at','user_id','cate_id')->orderBy('updated_at','desc')->paginate($number,['*'],'order');
    }

    //Finish order
    public function getFinished() {
        $order_id = $this->id;
        $favOModel = new FavO();
        $favOs = $favOModel->getFavByOrder($order_id);
        $matchs = Match::select('id')->where('order_id', $order_id)->where('point','>=',50)->get();
        
        foreach ($favOs as $favO) {
            $favO->delete();
        }
        foreach ($matchs as $match) {
            $match->point = 0;
            $match->save();
        }

        $this->finished = true;
        $this->save();
    }
}
