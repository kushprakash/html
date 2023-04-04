<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubOrder extends Model
{
    use SoftDeletes;
    protected $table = 'sub_order';
    protected $guarded = ['id'];
}