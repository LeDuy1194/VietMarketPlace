<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getLogin() {
        return view('account.pages.login');
    }

    public function postLogin(LoginRequest $request) {
        $login = array(
            'email' => $request->email,
            'password' => $request->password
            );
        if (!Auth::attempt($login)) {
                return redirect()->back();
                //return view('pages.myStore');
            }
            else {
                //return view('pages.myStore');
                return redirect()->Route('Home');
            }
    }

    public function getLogout(Request $request){
        if (\Auth::check()) {
            \Auth::logout();
        }
        return \Redirect::intended('/');
    }
}
