<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name','last_name','status',
    ];

    public function speciality(){
        return $this->belongsTo('App\Speciality');
    }
}
