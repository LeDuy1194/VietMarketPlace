<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';

    protected $fillable = ['name', 'alias'];

    public $timestamps = true;

    public function getTagByAlias($name) {
    	return $this->where('alias',$name)->first();
    }
}
