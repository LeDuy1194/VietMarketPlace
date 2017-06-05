<?php

namespace App\Console;

use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use LRedis;
use Mail;
use App\Models\StockNotification;
use App\Models\OrderNotification;
use App\Models\User;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\AutoDelPost::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Log::info("Start check post valid time");
            Log::info("---------------------------------------");
            $type_noti = 'autoDel';
            $userModel = new User();
            $stockNotification = new StockNotification();
            $orderNotification = new OrderNotification();

            Log::info("Stock check: ");
            $stocks = DB::table('stocks')->get();
            foreach ($stocks as $index_stocks => $stock) {
                $dataType = 'stock';
                Log::info("Stock check time valid: ");
                $validTime = checkTimePostToSendNoti($stock->created_at);
                if ($validTime == 'invalid') {
                    $author = $userModel->getDetailUserByUserID($stock->user_id);
                    $toEmail = $author['email'];
                    Log::info("Auto delete stock: " . $stock->id . " & name stock: " . $stock->name);
                    $order_query = DB::table('stock_notifications') -> where('stock_id', $stock->id)
                        -> where('type_noti', $type_noti)
                        -> count();

                    if ($order_query == 0) {
                        $data = array(
                            'dataType'=>$dataType,
                            'dataPost'=>$stock,
                            'dataUser'=>$author
                        );

//                        Mail::send('mails.autoDelPost', $data, function($message) use ($toEmail) {
//                            $message->to('nobikun1412@gmail.com')->subject('[Auto delete post] Bạn có 1 bài viết sắp hết hạn đăng, vui lòng kiểm tra lại!');
//                        });

                        Mail::send('mails.autoDelPost', $data, function($message) use ($toEmail) {
                            $message->to($toEmail)->subject('[Auto delete post] Bạn có 1 bài viết sắp hết hạn đăng, vui lòng kiểm tra lại!');
                        });

                        $stockNotification->createNewStockNotification($stock->id, $stock->user_id, $type_noti);
                        $stockNotiNoRead = $stockNotification->getAllStockNotificationNoRead($stock->user_id);
                        $stockNotiNoRead = sizeof($stockNotiNoRead);
                        $orderNotiNoRead = $orderNotification->getAllOrderNotificationNoRead($stock->user_id);
                        $orderNotiNoRead = sizeof($orderNotiNoRead);
                        $totalNoti = $stockNotiNoRead + $orderNotiNoRead;

                        $redis = LRedis::connection();
                        $redis->publish('notification', json_encode(['type' => 'stock', 'result_match' => $stock, 'type_noti' => $type_noti , 'totalNoti' => $totalNoti]));
                    }

                    //Check time post to delete:
                    $validTimeDele = checkTimePostToDelete($stock->created_at);
                    if ($validTimeDele == 'delete') {
                        DB::table('stocks')->where('id', $stock->id)->delete();
                    }
                }
            }

            Log::info("Order check: ");
            $orders = DB::table('orders')->get();
            foreach ($orders as $index_orders => $order) {
                $dataType = 'order';
                Log::info("Order check time valid: ");
                $validTime = checkTimePostToSendNoti($order->created_at);
                if ($validTime == 'invalid') {
                    $author = $userModel->getDetailUserByUserID($order->user_id);
                    $toEmail = $author['email'];
                    Log::info("Auto delete order: " . $order->id . " & name stock: " . $order->name);
                    $order_query = DB::table('order_notifications') -> where('order_id', $order->id)
                        -> where('type_noti', $type_noti)
                        -> count();
                    if ($order_query == 0) {
                        $data = array(
                            'dataType'=>$dataType,
                            'dataPost'=>$order,
                            'dataUser'=>$author
                        );

//                        Mail::send('mails.autoDelPost', $data, function($message) use ($toEmail) {
//                            $message->to('nobikun1412@gmail.com')->subject('[Auto delete post] Bạn có 1 bài viết sắp hết hạn đăng, vui lòng kiểm tra lại!');
//                        });

                        Mail::send('mails.autoDelPost', $data, function($message) use ($toEmail) {
                            $message->to($toEmail)->subject('[Auto delete post] Bạn có 1 bài viết sắp hết hạn đăng, vui lòng kiểm tra lại!');
                        });

                        $orderNotification->createNewOrderNotification($order->id, $order->user_id, $type_noti);
                        $orderNotiNoRead = $orderNotification->getAllOrderNotificationNoRead($order->user_id);
                        $orderNotiNoRead = sizeof($orderNotiNoRead);
                        $stockNotiNoRead = $stockNotification->getAllStockNotificationNoRead($order->user_id);
                        $stockNotiNoRead = sizeof($stockNotiNoRead);
                        $totalNoti = $stockNotiNoRead + $orderNotiNoRead;

                        $redis = LRedis::connection();
                        $redis->publish('notification', json_encode(['type' => 'order', 'result_match' => $order, 'type_noti' => $type_noti , 'totalNoti' => $totalNoti]));
                    }

                    //Check time post to delete:
                    $validTimeDele = checkTimePostToDelete($order->created_at);
                    if ($validTimeDele == 'delete') {
                        DB::table('orders')->where('id', $order->id)->delete();
                    }
                }
            }
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
