<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('register_number');
            $table->string('bac_number')->nullable();
            $table->string('bac_year')->nullable();
            $table->string('last_name_fr')->nullable();
            $table->string('first_name_fr')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('residence_adress')->nullable();
            $table->string('graduated_school')->nullable();
            $table->string('year_of_gradution')->nullable();
            $table->string('type_of_course')->nullable();
            $table->string('faculty')->nullable();
            $table->string('speciality_diploma')->nullable();
            $table->string('master_classification_category')->nullable();
            $table->string('average_before_last_year')->nullable();
            $table->string('last_year_graduate_average')->nullable();
            $table->string('master_thesis_note')->nullable();
            $table->string('speciality_requested_fr')->nullable();
            $table->string('speciality_requested_ar')->nullable();
            $table->string('secrete_code')->nullable();
            $table->string('module_1_note_1')->nullable();
            $table->string('module_1_note_2')->nullable();
            $table->string('module_1_note_3')->nullable();
            $table->string('module_2_note_1')->nullable();
            $table->string('module_2_note_2')->nullable();
            $table->string('module_2_note_3')->nullable();
            $table->string('note_final_module_1')->nullable();
            $table->string('note_final_module_2')->nullable();
            $table->string('moyenne_doctorat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
