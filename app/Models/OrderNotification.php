<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderNotification extends Model
{
    protected $table = 'order_notifications';

    protected $fillable = ['order_id', 'user_id', 'read', 'read_at'];

    public $timestamps = true;

    public function createNewOrderNotification ($order_id, $user_id) {

        $order_query = DB::table('order_notifications')-> where('order_id', $order_id)-> count();

        if ($order_query == 0) {
            $orderNoti = new OrderNotification();
            $orderNoti->order_id = $order_id;
            $orderNoti->user_id = $user_id;
            $orderNoti->save();
        }
        else {
            DB::table('order_notifications')-> where('order_id', $order_id)
                -> update(['read' => 0, 'updated_at' => Carbon::now()]);
        }
        return 'success';
    }

    public function getAllOrderNotificationNoRead ($user_id) {
        $totalOrderNotiNoRead = $this -> where('user_id', $user_id)
                                        -> where('read', 0)
                                        -> get();
//        dd($totalOrderNotiNoRead);
        return $totalOrderNotiNoRead;
    }

    public function getAllOrderNotification ($user_id) {
        $totalOrderNoti = $this->where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->get();
//        dd($totalStockNotiNoRead);
        return $totalOrderNoti;
    }

    public function readNotication($order_id) {
        DB::table('order_notifications')-> where('order_id', $order_id)
            -> update(['read' => 1, 'read_at' => Carbon::now()]);
        return 'success';
    }

    public function markAllOrderNoticationAsRead() {
        DB::table('order_notifications')-> where('read', 0)
            -> update(['read' => 1]);
        return 'success';
    }
}
