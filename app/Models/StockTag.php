<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTag extends Model
{
    protected $table = 'stock_tag_lists';

    protected $fillable = ['stock_id', 'tag_id'];

    public $timestamps = true;

    public function getTagByStockId($id) {
    	return $this->select('tag_id')->where('stock_id',$id)->orderBy('tag_id','asc')->get();
    }
}
