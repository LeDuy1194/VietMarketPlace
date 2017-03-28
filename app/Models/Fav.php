<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    protected $table = 'favs';

    protected $fillable = ['user_id', 'stock_id'];

    public $timestamps = true;

    public function getFavByUser($id) {
        return $this->where('user_id',$id)->get();
    }

    public function getFavByStock($id) {
        return $this->where('stock_id',$id)->get();
    }
}
