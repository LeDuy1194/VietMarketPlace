<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    protected $table = 'order_tag_lists';

    protected $fillable = ['order_id', 'tag_id'];

    public $timestamps = true;

    /*	return array of tag_id;
    */
    public function getTagByOrderId($id) {
    	$temp = $this->select('tag_id')->where('order_id',$id)->orderBy('tag_id','asc')->get();
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
