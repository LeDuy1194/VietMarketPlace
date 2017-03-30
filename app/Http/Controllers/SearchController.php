<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;
use App\Models\User;
use Illuminate\Database\Connection;

class SearchController extends Controller
{

    public function getSearch(Request $request)
    {
        $userModel = new User();
        $cateModel = new Cate();
        // Gets the query string from our form submission
        $key = $request->search_key;
        $type = $request->search_type;
        $cate = $request->search_cate;
//        $status = $request->search_status;
//        $rate = $request->search_rate;
//        $city = $request->search_city;
/*        if ($type == '') {
            if ($cate == '') {
                $articles['stocks'] = DB::table('stocks')->where('name', 'LIKE', '%' . $key . '%')
//                                      ->where('cate_id', '=', $cate)
                    ->paginate(10);
                $articles['orders'] = DB::table('orders')->where('name', 'LIKE', '%' . $key . '%')
//                                      ->where('cate_id', '=', $cate)
                    ->paginate(10);
            }
            else {
                $articles['stocks'] = DB::table('stocks')->where('name', 'LIKE', '%' . $key . '%')
                    ->where('cate_id', '=', $cate)
                    ->paginate(10);
                $articles['orders'] = DB::table('orders')->where('name', 'LIKE', '%' . $key . '%')
                    ->where('cate_id', '=', $cate)
                    ->paginate(10);
            }
        }
        else {
            if ($cate == '') {
                $articles[$type] = DB::table($type)->where('name', 'LIKE', '%' . $key . '%')
//                                      ->where('cate_id', '=', $cate)
                    ->paginate(10);
            }
            else {
                $articles[$type] = DB::table($type)->where('name', 'LIKE', '%' . $key . '%')
                    ->where('cate_id', '=', $cate)
                    ->paginate(10);
            }
        }*/
            $articles[$type] = DB::table($type)->where('name', 'LIKE', '%' . $key . '%')
                ->whereExists(function ($cate) {
                    DB::raw("SELECT * WHERE  'cate_id'= '" . $cate . "'");
                })
//                                      ->where('cate_id', '=', $cate)
                ->paginate(10);
        dd($articles);
        // returns a view and passes the view the list of articles and the original query.
        return view('pages.search', compact('articles','userModel','cateModel'));
    }
}
