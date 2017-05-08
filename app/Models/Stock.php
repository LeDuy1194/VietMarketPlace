<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    //
    protected $table = 'stocks';

    protected $fillable = ['name', 'price', 'status', 'description', 'place', 'city', 'district', 'lat','lng' ,'img', 'user_id', 'cate_id', 'finished'];

    public $timestamps = true;

    public function user() {
    	return $this->belongTo('App\Models\User');
    }

    public function cate() {
    	return $this->belongTo('App\Models\Cate');
    }
    
    public function simage() {
        return $this->hasMany('App\Models\StockImage');
    }

    //Get the newest $number stock.
    public function getNewest($number) {
        return $this->where('finished',0)->orderBy('updated_at','desc')->take($number)->get();
    }

    //Get paginate
    public function getPage($number) {
        return $this->where('finished',0)->orderBy('updated_at','desc')->paginate($number,['*'],'stock');
    }

    //Get stock by cate.
    public function getStockByCateId($cate_id,$number) {
        return $this->where('finished',0)->where('cate_id',$cate_id)->orderBy('id','desc')->paginate($number,['*'],'stock');
    }

    //Get all Product
    public function getAllStock() {
        return $this->get();
    }

    //Search Stock --- Create by Anh Pham
    public function searchStock($request) {
        $key = $request->search_key;
        $cate = $request->search_cate;
        $status = $request->search_status;
        $stock_query = DB::table('stocks')->where('name', 'LIKE', '%' . $key . '%');
        if ($cate != '')
        {
            $stock_query = $stock_query->where('cate_id', $cate);
        }

        if ($status != '')
        {
            $stock_query = $stock_query->where('status', $status);
        }
        $result = $stock_query->get();
        return $result;
    }
}