<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTag extends Model
{
    protected $table = 'stock_tag_lists';

    protected $fillable = ['stock_id', 'tag_id'];

    public $timestamps = true;
}
