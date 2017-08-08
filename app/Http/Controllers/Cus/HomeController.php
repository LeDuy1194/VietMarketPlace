<?php

namespace App\Http\Controllers\Cus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function __construct() {
    	$this->middleware('auth', ['except' => 'getLogout']);
    }

    public function index() {
    	return view('pages.home');
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect(\URL::previous());
    }
}
