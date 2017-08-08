<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Fav;
use App\Models\Match;

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

    //Get stock by user.
    public function getStockByUserId($user_id) {
        return $this->where('finished',0)->where('user_id',$user_id)->orderBy('id','desc')->get();
    }

    //Get all Product
    public function getAllStock() {
        return $this->where('finished',0)->get();
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
        $result = $stock_query->where('finished',0)->get();
        return $result;
    }

    //Get admin paginate
    public function getAdminPage($number) {
        return $this->select('id','name','created_at','user_id','cate_id','finished')->orderBy('updated_at','desc')->paginate($number,['*'],'stock');
    }

    //Finish stock
    public function getFinished() {
        $stock_id = $this->id;
        $favModel = new Fav();
        $favs = $favModel->getFavByStock($stock_id);
        $matchs = Match::select('id')->where('stock_id', $stock_id)->where('point','>=',50)->get();
        
        foreach ($favs as $fav) {
            $fav->delete();
        }
        foreach ($matchs as $match) {
            $match->point = 0;
            $match->save();
        }

        $this->finished = true;
        $this->save();
    }
}