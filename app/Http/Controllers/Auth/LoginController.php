<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\User;
use App\ActivationService;
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

    protected $activationService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService) {
//        $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
        $this->activationService = $activationService;
    }

    public function getLogin() {
        return view('account.pages.login');
    }

    public function authenticated(Request $request, $user) {
        $result = true;
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            $result = false;
        }
        return $result;
    }

    public function postLogin(LoginRequest $request) {
        $login = array(
            'email' => $request->email,
            'password' => $request->password
            );
        if (!Auth::attempt($login)) {
            $message = ['flash_level'=>'danger message-custom','flash_message'=>'Thông tin email/password sai.'];
            return redirect()->back()->with($message);
            //return view('pages.myStore');
        }
        else {
            //return view('pages.myStore');
            $check = $this->authenticated($request, $this->guard()->user());
            if ($check) {
                return redirect()->Route('Home');
            }
            else {
                $message = ['flash_level'=>'warning message-custom','flash_message'=>'Bạn cần phải xác nhận tài khoản. Vui lòng kiểm tra email của bạn.'];
                return redirect()->Route('getLogin')->with($message);
            }
        }
    }

    public function activateUser($token) {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
