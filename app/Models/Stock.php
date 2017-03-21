<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'stocks';

    protected $fillable = ['name', 'price', 'status', 'description', 'place', 'img', 'user_id', 'cate_id'];

    public $timestamps = true;

    public function user() {
    	return $this->belongTo('App\Models\User');
    }

    public function cate() {
    	return $this->belongTo('App\Models\Cate');
    }

    public function simage() {
    	return $this->hasMany('App\Models\StockImage');
    }
}