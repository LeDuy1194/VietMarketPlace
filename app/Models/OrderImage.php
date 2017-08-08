<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderImage extends Model
{
    //
    protected $table = 'orderimages';

    protected $fillable = ['image', 'order_id'];

    public $timestamps = false;

    public function order() {
    	return $this->belongTo('App\Models\Order');
    }

    //Get images for product by order_id ----- Created by Hai
    public function getImages($order_id) {
        return $this->where('order_id', $order_id)->pluck('image');
    }
}
