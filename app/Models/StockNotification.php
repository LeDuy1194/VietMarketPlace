<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockNotification extends Model
{
    protected $table = 'stock_notifications';

    protected $fillable = ['stock_id', 'user_id', 'type_noti', 'read', 'read_at'];

    public $timestamps = true;

    public function createNewStockNotification ($stock_id, $user_id, $type_noti) {

        $order_query = DB::table('stock_notifications') -> where('stock_id', $stock_id)
                                                        -> where('type_noti', $type_noti)
                                                        -> count();

        if ($order_query == 0) {
            $stockNoti = new StockNotification();
            $stockNoti->stock_id = $stock_id;
            $stockNoti->user_id = $user_id;
            $stockNoti->type_noti = $type_noti;
            $stockNoti->save();
        }
        else {
            DB::table('stock_notifications')-> where('stock_id', $stock_id)
                                            -> where('type_noti', $type_noti)
                                            -> update(['read' => 0, 'updated_at' => Carbon::now()]);
        }
        return 'success';
    }

    public function getAllStockNotificationNoRead ($user_id) {
        $totalStockNotiNoRead = $this->where('user_id', $user_id)
                                    ->where('read', 0)
                                    ->get();
//        dd($totalStockNotiNoRead);
        return $totalStockNotiNoRead;
    }

    public function getAllStockNotification ($user_id) {
        $totalStockNoti = $this->where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->get();
//        dd($totalStockNotiNoRead);
        return $totalStockNoti;
    }

    public function readNotication($stock_id, $type_noti) {
        DB::table('stock_notifications')-> where('stock_id', $stock_id)
                                        -> where('type_noti', $type_noti)
                                        -> update(['read' => 1, 'read_at' => Carbon::now()]);
        return 'success';
    }

    public function markAllStockNoticationAsRead() {
        DB::table('stock_notifications')-> where('read', 0)
                                        -> update(['read' => 1, 'read_at' => Carbon::now()]);
        return 'success';
    }
}
