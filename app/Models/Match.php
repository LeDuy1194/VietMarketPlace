<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Match extends Model
{
    //
    protected $table = 'matchs';

    protected $fillable = ['stock_id', 'order_id'];

    public $timestamps = true;

    public function getStockByOrderId($id,$number) {
    	$stock = $this->select('stock_id')->where('order_id',$id)->get();
        $result = DB::table('stocks')->whereIn('id',$stock)->orderBy('updated_at','desc')->paginate($number);
        return $result;
    }

    public function getOrderByStockId($id,$number) {
        $order = $this->select('order_id')->where('stock_id',$id)->get();
        $result = DB::table('orders')->whereIn('id',$order)->orderBy('updated_at','desc')->paginate($number);
        return $result;
    }
}
