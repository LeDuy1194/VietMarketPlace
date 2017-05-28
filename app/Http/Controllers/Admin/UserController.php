<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class UserController extends Controller
{
    public function getList () {
        $number = 6;
        $model = new User();
        $data = $model->getAdminPage($number);
    	return view('admin.user.list',compact('data'));
    }

    public function getAdd () {

    }

    public function postAdd (CateRequest $request) {
    	
    }

    public function getDelete ($id) {
        $user = User::find($id);
        $userName = $user->username;
        $user->delete();
        $message = ['flash_level'=>'success','flash_message'=>'Xóa tài khoản'.$userName.' thành công.'];
        return redirect()->route('admin.order.list')->with($message);
    }

    public function getEdit ($id) {
        
    }

    public function postEdit (Request $request,$id) {
        
    }
}
