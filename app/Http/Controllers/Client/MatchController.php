<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
use App\Models\User;
use App\Models\Fav;
use App\Models\Match;
use Auth;

class MatchController extends Controller
{
    // Get list of matching.
    public function getMatch($state,$id) {
    	$number = 10;
    	$matchModel = new Match();
    	$cateModel = new Cate();
    	$userModel = new User();
    	if ($state=='stock') {
    		$base = Stock::findOrFail($id);
    		$data = $matchModel->getOrderByStockId($id,$number);
    	}
    	else {
    		$base = Order::findOrFail($id);
    		$data = $matchModel->getStockByOrderId($id,$number);
    	}
    	return view('pages.match',compact('base','data','state','cateModel','userModel'));
    }
}
