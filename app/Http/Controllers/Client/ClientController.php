<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientUpStockRequest;
class ClientController extends Controller
{
    public function getUploadStock() {
    	return view('haiblade.pages.uploadstock');
    }
    public function postUploadStock(ClientUpStockRequest $request) {
    	
    }
}
