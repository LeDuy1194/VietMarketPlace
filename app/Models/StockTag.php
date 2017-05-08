<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTag extends Model
{
    protected $table = 'stock_tag_lists';

    protected $fillable = ['stock_id', 'tag_id'];

    public $timestamps = true;

    /*	return array of tag_id;
    */
    public function getTagByStockId($id) {
    	$temp = $this->select('tag_id')->where('stock_id',$id)->orderBy('tag_id','asc')->get();
    	$result = [];
    	if (!is_null($temp)) {
	    	foreach ($temp as $tag) {
	    		$result[] = $tag->tag_id;
	    	}
	    }
	    else {
	    	$result = NULL;
	    }
    	return $result;
    }
}
