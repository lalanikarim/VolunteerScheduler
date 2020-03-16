<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['bar_code','first_name','middle_name','last_name','phone_number','email'];

    public function fullName()
    {
        $name = $this->first_name;
        if(isset($this->middle_name) && strlen($this->middle_name) > 0){
            $name .= " " . $this->middle_name;
        }
        $name .= " " . $this->last_name;
        return $name;
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class,'team_volunteer','volunteer_id','team_id');
    }
}
