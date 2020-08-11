<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany('App\Student','speciality_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
