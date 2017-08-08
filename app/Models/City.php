<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = ['cityid', 'name', 'type'];

    public function rdistrict() {
        return $this->hasMany('App\Models\District');
    }

    public function getCityByName($city) {
        return $this->where('name',$city)->first();
    }

    public function getCityByCityId($id) {
        return $this->where('cityid',$id)->first();
    }
}
