<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    //
    protected $table = 'stockimages';

    protected $fillable = ['image', 'stock_id'];

    public $timestamps = false;

    public function stock() {
    	return $this->belongTo('App\Models\Stock');
    }

    //Get images for product by stock_id ----- Created by Anh Pham
    public function getImages($stock_id) {
        return $this->where('stock_id', $stock_id)->pluck('image');
    }
}
