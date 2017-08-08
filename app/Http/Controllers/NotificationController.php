<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Carbon\Carbon;

class NotificationController extends Controller
{
    public function __construct() {
    }

    public function delete($notiId, $state, $id) {
        $user = User::where('id', \Auth::id())->first();
        $notification = $user->notifications()->where('id', $notiId)->first();
        if ($notification) {
            $date = Carbon::now();
            $notification->read_at = $date;
            $notification->save();
            return redirect()->route('getMatch', [$state, $id]);
        }
        else return back();
    }
}
