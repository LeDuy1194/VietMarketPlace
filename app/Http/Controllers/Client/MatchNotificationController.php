<?php

namespace App\Http\Controllers\Client;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\User;
use App\Models\StockNotification;
use App\Models\OrderNotification;
use Request;

class MatchNotificationController extends Controller
{
    public function getMatchNotification ($user_id) {
        if (Request::ajax()) {
            $stockModel = new StockNotification();
            $orderModel = new OrderNotification();
            $result_stock_notifications = [];
            $result_order_notifications = [];

            $stockNotis = $stockModel->getAllStockNotification($user_id);
            $stockNotiNoRead = $stockModel->getAllStockNotificationNoRead($user_id);
            $stockNotiNoRead = sizeof($stockNotiNoRead);
            if (sizeof($stockNotis) != 0) {
                foreach ($stockNotis as $index_stock => $stockNoti) {
                    $stock_notification = Stock::find($stockNoti->stock_id);
                    $strTimeAgo = timeago($stockNoti->updated_at);
                    $stock_notification['noti_updated'] = $strTimeAgo;
                    $stock_notification['read'] = $stockNoti->read;
                    array_push($result_stock_notifications, $stock_notification);
                }
            }

            $orderNotiNoRead = $orderModel->getAllOrderNotificationNoRead($user_id);
            $orderNotiNoRead = sizeof($orderNotiNoRead);
            $orderNotis = $orderModel->getAllOrderNotification($user_id);
            if (sizeof($orderNotis) != 0) {
                foreach ($orderNotis as $index_order => $orderNoti) {
                    $order_notification = Order::find($orderNoti->order_id);
                    $order_notification['noti_updated'] = $orderNoti->updated_at;
                    $order_notification['read'] = $orderNoti->read;
                    array_push($result_order_notifications, $order_notification);
                }
        }
            return json_encode(['stockNotis' => $result_stock_notifications, 'orderNotis' => $result_order_notifications, 'stockNoRead' => $stockNotiNoRead, 'orderNoRead' => $orderNotiNoRead]);
//            return json_encode(['stockNotis' => 'ok']);
        }
    }

    public function readNotification ($type, $id) {
        if (Request::ajax()) {
            if ($type == 0) {
                $readModel = new StockNotification();
            }
            else $readModel = new OrderNotification();

            $readNoti = $readModel->readNotication($id);

            return json_encode(['ok' => $readNoti]);
        }
    }

    public function markAllNotificationAsRead() {
        if (Request::ajax()) {
            $stockModel = new StockNotification();
            $orderModel = new OrderNotification();

            $stockModel->markAllStockNoticationAsRead();
            $orderModel->markAllOrderNoticationAsRead();

            return json_encode(['ok' => 'markAllRead']);
        }
    }
}
