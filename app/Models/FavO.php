<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavO extends Model
{
    protected $table = 'favOs';

    protected $fillable = ['user_id', 'order_id'];

    public $timestamps = true;

    public function getFavByUser($id,$number) {
        return $this->where('user_id',$id)->paginate($number,['*'],'order');
    }

    public function getFavByOrder($id) {
        return $this->where('order_id',$id)->get();
    }

    public function getFav($user_id,$order_id) {
    	return $this->select('id')->where('user_id',$user_id)->where('order_id',$order_id)->first();
    }
}
