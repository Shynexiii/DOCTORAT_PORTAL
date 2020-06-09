<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class StudentsExport implements FromQuery,WithHeadings
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Student::query()->select('register_number', 'secrete_code', 'last_name_fr', 'first_name_fr', 'date_of_birth', 'module_1_note_1', 'module_1_note_2', 'module_1_note_3', 'module_2_note_1', 'module_2_note_2', 'module_2_note_3', 'note_final_module_1', 'note_final_module_2', 'moyenne_doctorat')->where('speciality_id', $this->id);
    }

    public function headings(): array
    {
        return [
            ['Numéro','Matricule Candidat','Nom FR','Prénom Fr','Date de Naissance','Note 1','Note 2','Note 3','Moyenne','Note 1','Note 2','Note 3','Moyenne','Moyenne Génerale','Classement'],
         ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return Student::all();
    } */
}
