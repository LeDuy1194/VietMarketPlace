<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Cate;
class MapController extends Controller
{
    public function showMap(Request request) {
    	$lat = $request->lat;
    	$lng = $request->lng;
    	$item = Stock::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
    	return $item;
    }
}
