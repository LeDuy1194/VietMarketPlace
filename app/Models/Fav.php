<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    protected $table = 'favs';

    protected $fillable = ['user_id', 'stock_id'];

    public $timestamps = true;

    public function getFavByUser($id,$number) {
        return $this->where('user_id',$id)->paginate($number,['*'],'stock');
    }

    public function getFavByStock($id) {
        return $this->where('stock_id',$id)->get();
    }

    public function getFav($user_id,$stock_id) {
    	return $this->select('id')->where('user_id',$user_id)->where('stock_id',$stock_id)->first();
    }
}
