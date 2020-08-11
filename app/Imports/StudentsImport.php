<?php

namespace App\Imports;

use App\Student;
use App\Speciality;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;



class StudentsImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

    public function rules(): array
    {
        return [
            '0' => 'unique:students,register_number',
        ];
    }
    
    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return ['0' => 'Register number'];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $specialities = Speciality::all();
        
        $student = new Student([
            'speciality_id'                     => request()->speciality ?? '1',
            'register_number'					=> $row['matricule_candidat'],
            'bac_number'						=> $row['matricule_bac'],
            'bac_year'							=> $row['annee_de_bac'],
            'last_name_fr'						=> $row['nom_fr'],
            'first_name_fr'						=> $row['prenom_fr'],
            'last_name_ar'						=> $row['nom_ar'],
            'first_name_ar'						=> $row['prenom_ar'],
            'date_of_birth'						=> $row['date_de_naissance'],
            'place_of_birth'					=> $row['lieu_naissance'],
            'phone_number'						=> $row['telephone'],
            'email'							  	=> $row['mail'],
            'residence_adress'					=> $row['adresse_de_residence'],
            'graduated_school'					=> $row['etablissement_diplome'],
            'year_of_gradution'					=> $row['annee_de_diplome'],
            'type_of_course'					=> $row['type_cursus_lmdclass'],
            'faculty'							=> $row['filiere'],
            'speciality_diploma'				=> $row['specialite_diplome_si_lmd'],
            'master_classification_category'   	=> $row['categorie_de_classement_master'],
            'average_before_last_year'          => $row['moyenne_generale_de_lavant_derniere_annee_de_la_formation_graduee'],
            'last_year_graduate_average'		=> $row['moyenne_generale_de_la_2eme_annee_de_master_ou_le_cas_echeant_de_la_derniere_annee_de_la_formation_graduee'],
            'master_thesis_note'                => $row['note_de_memoire_de_master'],
            'speciality_requested_fr'			=> $row['specialite_demandee_fr'],
            'speciality_requested_ar'			=> $row['specialite_demandee_ar'],
        ]);
            $student->save();
            /* foreach ($specialities as $key => $specialitie) {
            } */
        return $student;
        
    }

    public function headingRow(): int
    {
        return 4;
    }

    
}
