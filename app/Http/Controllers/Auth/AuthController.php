<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller\LoginController;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function getLogin() {
        return view('account.pages.login');
    }

    public function postLogin(LoginRequest $request) {
        /*
    	$rules = [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	];

    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email phải đúng định dạng',
    		'password.required' => 'Password là trường bắt buộc',
    		'password.min' => 'Password phải chứa ít nhất 6 ký tự'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}
    	else {
    		$email = $request->input('email');
    		$password = $request->input('password');

    		if (Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->intended('/');
    		}
    		else {
    			$errors = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    		
    	}*/
        $login = array(
            'email' => $request->email,
            'password' => $request->password
            );
        if (Auth::attempt($login)) {
                return redirect()->Route('Home');
            }
            else {
                $errors = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
    }
}
