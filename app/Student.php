<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'speciality_id',
        'register_number',
        'last_name_fr',
        'first_name_fr',
        'last_name_ar',
        'first_name_ar',
        'date_of_birth',
        'bac_number',	
        'bac_year',
        'place_of_birth',	
        'phone_number',
        'email',	
        'residence_adress',	
        'graduated_school',	
        'year_of_gradution',	
        'type_of_course',
        'faculty',	
        'speciality_diploma',
        'master_classification_category',		
        'average_before_last_year',		
        'last_year_graduate_average',		
        'master_thesis_note',		
        'speciality_requested_fr',	
        'speciality_requested_ar',        
    ];
    
    public function speciality(){
        return $this->belongsTo('App\Speciality');
    }
}
