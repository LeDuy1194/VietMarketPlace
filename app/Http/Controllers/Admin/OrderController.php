<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\File;

class OrderController extends Controller {
    public function getList () {
        $number = 6;
        $model = new Order();
        $data = $model->getAdminPage($number);
        return view('admin.order.list',compact('data'));
    }

    public function getDelete ($id) {
        $product = Order::find($id);
        $directory = base_path() . '/resources/upload/orders/order-' .$id;
        File::cleanDirectory($directory);
        File::deleteDirectory($directory);
        $productName = $product->name;
        $product->delete();
        $message = ['flash_level'=>'success message-custom','flash_message'=>'Xóa '.$productName.' thành công.'];
        return redirect()->route('admin.order.list')->with($message);
    }
}
