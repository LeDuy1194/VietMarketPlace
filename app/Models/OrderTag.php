<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    protected $table = 'order_tag_lists';

    protected $fillable = ['order_id', 'tag_id'];

    public $timestamps = true;

    public function getTagByOrderId($id) {
    	return $this->select('tag_id')->where('order_id',$id)->get();
    }
}
