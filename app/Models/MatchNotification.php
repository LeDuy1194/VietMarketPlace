<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MatchNotification extends Model
{
    protected $table = 'match_notifications';

    protected $fillable = ['product_id', 'type', 'read', 'read_at'];

    public $timestamps = true;

    public function createNewMatchNotification ($product_id, $type) {

        $order_query = DB::table('match_notifications')->where('product_id', $product_id)
                                                       -> where('type', $type)
                                                        -> count();

        if ($order_query == 0) {
            $matchNoti = new MatchNotification();
            $matchNoti->product_id = $product_id;
            $matchNoti->type = $type;
            $matchNoti->save();
        }
        else {
            DB::table('match_notifications')->where('product_id', $product_id)
                -> where('type', $type)
                -> update(['read' => 0, 'updated_at' => Carbon::now()]);
        }
        return $order_query;
    }
}
