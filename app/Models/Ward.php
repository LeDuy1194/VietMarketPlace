<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';

    protected $fillable = ['wardid', 'name', 'type', 'location', 'districtid'];

    public function district() {
    	return $this->belongTo('App\Models\District');
    }
}
