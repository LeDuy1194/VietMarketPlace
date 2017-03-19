<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    public function getAdd () {
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.stock.add',compact('cate'));
    }

    public function postAdd (StockRequest $stock_request) {

    }
}
