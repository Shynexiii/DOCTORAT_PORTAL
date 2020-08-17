<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();
Route::redirect('/', 'login');
//Route::redirect('/logout', abort(404));

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

});

Route::group(['middleware' => ['can:admin']], function () {
    

    
    Route::get('home', 'Backend\HomeController@index')->name('home');
    Route::get('users/export', 'Backend\User\UserController@export')->name('users.export');
    Route::post('demo/import', 'DemoController@import')->name('demo.import');
    
    //User CRUD
    Route::get('users', 'Backend\User\UserController@index')->name('users.index');
    Route::get('users/create', 'Backend\User\UserController@create')->name('users.create');
    Route::post('users/store', 'Backend\User\UserController@store')->name('users.store');
    Route::get('users/{user}', 'Backend\User\UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'Backend\User\UserController@edit')->name('users.edit');
    Route::patch('users/{user}', 'Backend\User\UserController@update')->name('users.update');
    Route::delete('users/{user}', 'Backend\User\UserController@destroy')->name('users.delete');

    
    //Role CRUD
    /* Route::get('roles', 'Backend\User\RoleController@index')->name('roles.index');
    Route::get('roles/create', 'Backend\User\RoleController@create')->name('roles.create');
    Route::post('roles/store', 'Backend\User\RoleController@store')->name('roles.store');
    Route::get('roles/{role}', 'Backend\User\RoleController@show')->name('roles.show');
    Route::get('roles/{id}/edit', 'Backend\User\RoleController@edit')->name('roles.edit');
    Route::patch('roles/{id}', 'Backend\User\RoleController@update')->name('roles.update');
    Route::delete('roles/{id}', 'Backend\User\RoleController@destroy')->name('roles.delete'); */

    //Students CRUD
  
    Route::get('students/create', 'Backend\Student\StudentController@create')->name('students.create');
    Route::get('students/download', 'Backend\Student\StudentController@downloadForm')->name('students.downloadForm');
    Route::get('specialities/{speciality}/students/list', 'Backend\Student\StudentController@list')->name('students.list');
    Route::get('students/{student}', 'Backend\Student\StudentController@show')->name('students.show');
    Route::get('students/{student}/edit', 'Backend\Student\StudentController@edit')->name('students.edit');
    Route::post('students/download', 'Backend\Student\StudentController@download')->name('students.download');
    /* Route::post('students/generateNotes', 'Backend\Student\StudentController@generateNotes')->name('students.generateNotes'); */
    Route::post('students/store', 'Backend\Student\StudentController@store')->name('students.store');
    Route::post('students', 'Backend\Student\StudentController@secrete_code')->name('students.secrete_code');
    Route::patch('students/{student}', 'Backend\Student\StudentController@update')->name('students.update');
    Route::delete('students/{student}', 'Backend\Student\StudentController@destroy')->name('students.delete');
    
    
    //Specialities CRUD
    Route::get('specialities', 'Backend\University\SpecialityController@index')->name('specialities.index');
    Route::get('specialities/create', 'Backend\University\SpecialityController@create')->name('specialities.create');
    Route::post('specialities/store', 'Backend\University\SpecialityController@store')->name('specialities.store');
    Route::get('specialities/{speciality}', 'Backend\University\SpecialityController@show')->name('specialities.show');
    Route::get('specialities/{speciality}/edit', 'Backend\University\SpecialityController@edit')->name('specialities.edit');
    Route::patch('specialities/{speciality}', 'Backend\University\SpecialityController@update')->name('specialities.update');
    Route::delete('specialities/{speciality}', 'Backend\University\SpecialityController@destroy')->name('specialities.delete');

    //Backup
    Route::get('backup','Backend\Backup\BackupController@index')->name('backup.index');
    Route::post('backup/create','Backend\Backup\BackupController@create')->name('backup.create');
    Route::post('backup','Backend\Backup\BackupController@download')->name('backup.download');
    
    Route::get('usersPdf','Backend\Pdf\PdfController@UsersPdf')->name('users.pdf');
    Route::get('studentsPdf','Backend\Pdf\PdfController@StudentsPdf')->name('students.pdf');
    
});

 Route::group(['middleware' => ['can:adminOrCoding']], function () {
    Route::post('students', 'Backend\Student\StudentController@secrete_code')->name('students.secrete_code');
    Route::get('students', 'Backend\Student\StudentController@index')->name('students.index');
    Route::get('studentsCodePdf','Backend\Pdf\PdfController@StudentsCodePdf')->name('studentsCode.pdf');
});
   
Route::group(['middleware' => ['can:adminOrSecretariat']], function () {

    //Note CRUD
    Route::get('notes', 'Backend\Student\NoteController@index')->name('notes.index');
    Route::get('notes/create', 'Backend\Student\NoteController@create')->name('notes.create');
    Route::post('notes/store', 'Backend\Student\NoteController@store')->name('notes.store');
    Route::get('notes/{note}', 'Backend\Student\NoteController@show')->name('notes.show');
    Route::get('notes/{id}/edit', 'Backend\Student\NoteController@edit')->name('notes.edit');
    Route::patch('notes/{id}', 'Backend\Student\NoteController@update')->name('notes.update');
    Route::delete('notes/{note}', 'Backend\Student\NoteController@destroy')->name('notes.delete');

    //Teacher CRUD
    Route::get('teachers', 'Backend\Teacher\TeacherController@index')->name('teachers.index');
    Route::get('teachers/create', 'Backend\Teacher\TeacherController@create')->name('teachers.create');
    Route::post('teachers/store', 'Backend\Teacher\TeacherController@store')->name('teachers.store');
    Route::get('teachers/{teacher}', 'Backend\Teacher\TeacherController@show')->name('teachers.show');
    Route::get('teachers/{teacher}/edit', 'Backend\Teacher\TeacherController@edit')->name('teachers.edit');
    Route::patch('teachers/{teacher}', 'Backend\Teacher\TeacherController@update')->name('teachers.update');
    Route::delete('teachers/{teacher}', 'Backend\Teacher\TeacherController@destroy')->name('teachers.delete');


});

Route::group(['middleware' => ['can:all']], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

    



