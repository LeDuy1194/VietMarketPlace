<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Order;

class Match extends Model
{
    //
    protected $table = 'matchs';

    protected $fillable = ['stock_id', 'order_id', 'point'];

    public $timestamps = true;

    public function getStockByOrderId($id,$number) {
    	$stock = $this->select('stock_id')->where('order_id',$id)->where('point','>=',50)->get();
        $result = Stock::whereIn('id',$stock)->orderBy('price','asc')->paginate($number,['*'],'stock');
        return $result;
    }

    public function getStockNumber($id) {
        $stock = $this->select('stock_id')->where('order_id',$id)->where('point','>=',50)->get();
        return $stock->count();
    }

    public function getOrderByStockId($id,$number) {
        $order = $this->select('order_id')->where('stock_id',$id)->where('point','>=',50)->get();
        $result = Order::whereIn('id',$order)->orderBy('price','desc')->paginate($number,['*'],'order');
        return $result;
    }

    public function getOrderNumber($id) {
        $order = $this->select('order_id')->where('stock_id',$id)->where('point','>=',50)->get();
        return $order->count();
    }
}
