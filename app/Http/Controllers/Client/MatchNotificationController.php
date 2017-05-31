<?php

namespace App\Http\Controllers\Client;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\User;
use App\Models\MatchNotification;
use Request;

class MatchNotificationController extends Controller
{
    public function getMatchNotification ($user_id) {
        if (Request::ajax()) {
            $matchNotis = new MatchNotification();
            $result_stock_notifications = [];
            $result_order_notifications = [];
            $stockNotis = $matchNotis->getAllStockNotificationNoRead($user_id);
            if (sizeof($stockNotis) != 0) {
                foreach ($stockNotis as $index_stock => $stockNoti) {
                    $stock_notification = Stock::find($stockNoti->stock_id);
                    $stock_notification['noti_created'] = $stockNoti->created_at;
                    array_push($result_stock_notifications, $stock_notification);
                }
            }

            $orderNotis = $matchNotis->getAllOrderNotificationNoRead($user_id);
            if (sizeof($orderNotis) != 0) {
                foreach ($orderNotis as $index_order => $orderNoti) {
                    $order_notification = Order::find($orderNoti->order_id);
                    $order_notification['noti_created'] = $orderNoti->created_at;
                    array_push($result_order_notifications, $order_notification);
                }
            }
            return json_encode(['stockNotis' => $result_stock_notifications, 'orderNotis' => $result_order_notifications]);
        }
    }
}
