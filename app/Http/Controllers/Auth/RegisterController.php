<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\ActivationService;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Requests;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService) {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function getRegister() {
        return view('account.pages.register');
    }

    public function postRegister(RegisterRequest $request) {
        $account = new User;
        $account->username = $request->username;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->remember_token = $request->_token;
        $account->level = 0;
        $account->fullname = $request->fullname;
        $account->address = $request->address;
        $account->phone = $request->phone;
        $account->avatar = 'default_avatar.png';
        $account->save();

        $this->activationService->sendActivationMail($account);

        $message = ['flash_level'=>'success message-custom','flash_message'=>'Đăng ký thành công. Chúng tôi đã gửi thư xác nhận về email của bạn.'];
        return redirect()->Route('getLogin')->with($message);
    }
}
