<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';

    protected $fillable = ['districtid', 'name', 'type', 'location', 'cityid'];

    public function rward() {
        return $this->hasMany('App\Models\Ward');
    }

    public function city() {
    	return $this->belongTo('App\Models\City');
    }

    public function getDistrictByName($district) {
        return $this->where('name',$district)->first();
    }

    public function getDistrictByCityId($id) {
        return $this->where('cityid',$id)->first();
    }
}
