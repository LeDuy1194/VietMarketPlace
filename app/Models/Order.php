<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = ['name', 'price', 'status', 'description', 'place', 'city', 'district' ,'img', 'user_id', 'cate_id', 'finished'];

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
        return $this->where('finished',0)->orderBy('updated_at','desc')->paginate($number);
    }

    //Get order by cate.
    public function getOrderByCateId($cate_id,$number) {
        return $this->where('finished',0)->where('cate_id',$cate_id)->orderBy('id','desc')->paginate($number);
    }
}
