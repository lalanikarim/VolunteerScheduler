<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['bar_code','first_name','middle_name','last_name','phone_number','email'];
}
