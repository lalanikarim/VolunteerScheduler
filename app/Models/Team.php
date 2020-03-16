<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = ['name','lead_id'];

    public function lead()
    {
        return $this->hasOne(Volunteer::class,'id','lead_id');
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class,'team_volunteer','team_id','volunteer_id');
    }
}
