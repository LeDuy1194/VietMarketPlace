<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MatchNotification extends Model
{
    protected $table = 'match_notifications';

    protected $fillable = ['stock_id', 'order_id', 'user_id_stock', 'user_id_order', 'read_stock', 'read_order', 'read_stock_at', 'read_order_at'];

    public $timestamps = true;

    public function createNewMatchNotification ($stock_id, $order_id, $user_id_stock, $user_id_order) {

//        $order_query = DB::table('match_notifications')->where('stock_id', $stock_id)
//                                                        -> where('order_id', $order_id)
//                                                        -> count();
//
//        if ($order_query == 0) {
            $matchNoti = new MatchNotification();
            $matchNoti->stock_id = $stock_id;
            $matchNoti->order_id = $order_id;
            $matchNoti->user_id_stock = $user_id_stock;
            $matchNoti->user_id_order = $user_id_order;
            $matchNoti->save();
//        }
//        else {
//            DB::table('match_notifications')->where('stock_id', $stock_id)
//                                            -> where('order_id', order_id)
//                                            -> update(['read' => 0, 'updated_at' => Carbon::now()]);
//        }
        return $matchNoti;
    }

    public function getNumberNotificationNoRead ($user_id) {
//        dd($user_id);
        $totalStockNoti = $this->where('user_id_stock', $user_id)
                                ->where('read_stock', 0)
                                ->groupBy('stock_id')
                                ->get();
//        dd($totalStockNoti);
        $totalStockNoti = sizeof($totalStockNoti);

        $totalOrderNoti = $this->where('user_id_order', $user_id)
                                ->where('read_order', 0)
                                ->groupBy('order_id')
                                ->get();
        $totalOrderNoti = sizeof($totalOrderNoti);

        $totalMatchNoti = $totalOrderNoti + $totalStockNoti;

        return $totalMatchNoti;
    }

    public function getAllStockNotificationNoRead ($user_id) {
        $totalStockNoti = $this->where('user_id_stock', $user_id)
            ->where('read_stock', 0)
            ->groupBy('stock_id')
            ->get();
        return $totalStockNoti;
    }

    public function getAllOrderNotificationNoRead ($user_id) {
        $totalOrderNoti = $this->where('user_id_order', $user_id)
            ->where('read_order', 0)
            ->groupBy('order_id')
            ->get();
        return $totalOrderNoti;
    }
}
