<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = 'cates';

    protected $fillable = ['name', 'alias', 'order', 'parent_id'];

    public $timestamps = true;

    public function stock() {
    	return $this->hasMany('App\Models\Stock');
    }

    public function order() {
    	return $this->hasMany('App\Models\Order');
    }

    public function getAllCate() {
        return $this->select('id','name')->get();
    }

    public function getCateByAlias($name) {
        return $this->where('alias',$name)->first();
    }

    public function getCateById($id) {
        return $this->where('id',$id)->first();
    }
}
