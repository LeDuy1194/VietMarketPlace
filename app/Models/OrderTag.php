<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    protected $table = 'order_tag_lists';

    protected $fillable = ['order_id', 'tag_id'];

    public $timestamps = true;
}
