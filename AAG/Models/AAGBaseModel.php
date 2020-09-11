<?php

namespace AAG\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AAGBaseModel extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
