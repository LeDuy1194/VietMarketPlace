<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;
use App\Models\User;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Review;
use App\Models\Fav;
use App\Models\FavO;
use Auth;

class SearchController extends Controller
{

    public function getSearch(Request $request)
    {
        $userModel = new User();
        $cateModel = new Cate();
        $reviewModel = new Review();
        $stock = new Stock();
        $order = new Order();
        $favModel = new Fav();
        $favOModel = new FavO();
        $type = $request->search_type;
        $articles['stocks'] = array();
        $articles['orders'] = array();
        if ($type == '') {
            $articles['stocks'] = $stock->searchStock($request);
            $articles['orders'] = $order->searchOrders($request);
        }
        elseif ($type == 'stocks') {
            $articles['stocks'] = $stock->searchStock($request);
        }
        else {
            $articles['orders'] = $order->searchOrders($request);
        }
        if (Auth::check()) {
            $author = $userModel->getDetailUserByUserID(Auth::id());
        }
        else {
            $author = NULL;
        }
//        dd($articles);
        // returns a view and passes the view the list of articles and the original query.
        $key_search = $request->search_key;
        return view('pages.search', compact('articles','userModel','cateModel','reviewModel', 'key_search','favModel','favOModel','author'));
    }
}
