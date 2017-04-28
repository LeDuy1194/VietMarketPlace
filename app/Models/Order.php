<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

        $result = $order_query->get();
        return $result;
    }
}
