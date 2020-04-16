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


Route::group(['middleware' => ['check-if-logged']], function(){

    // Users
    Route::get('/users/create', 'UsersController@create')->name('create-user');
    Route::get('/add-users', 'UsersController@create')->name('create-user');
    Route::post('/add-user', 'UsersController@store');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logout', 'UsersController@logout')->name('logout');
    Route::get('/users', 'UsersController@index')->name('list-user');
    Route::get('/users/{id}', 'UsersController@show')->name('list-user');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('edit-user');
    Route::post('/users/{id}/edit', 'UsersController@update')->name('edit-user');
    Route::get('/users/{id}/delete', 'UsersController@destroy')->name('list-user');
    Route::get('/verify-account/{id}', 'UsersController@verifyAccount')->name('verify-user');
    Route::get('/profile/{id}', 'UsersController@profile')->name('profile');


    // Access and Permissions
    Route::get('/roles', 'RolesController@index')->name('list-role');
    Route::get('/roles/create', 'RolesController@create')->name('create-role');
    Route::post('/add-role', 'RolesController@store')->name('add-role');
    Route::get('/roles/{id}/edit', 'RolesController@edit')->name('edit-role');
    Route::post('/roles/{id}/edit', 'RolesController@update')->name('edit-role');

    // Modules
    Route::get('/modules/create', 'ModulesController@create')->name('add-module');
    Route::get('/modules', 'ModulesController@index')->name('list-module');
    Route::post('/add-modules', 'ModulesController@store')->name('add-module');
    Route::get('/modules/{id}/edit', 'ModulesController@edit')->name('edit-module');
    Route::post('/modules/{id}/edit', 'ModulesController@update')->name('edit-module');

    /// Grades
    Route::get('/grades', 'GradesController@index')->name('list-grade');
    Route::get('/grades/create', 'GradesController@create')->name('create-grade');
    Route::post('/grades', 'GradesController@store')->name('create-grade');
    Route::get('/grades/{id}/edit', 'GradesController@edit')->name('edit-grade');
    Route::post('/grades/{id}/edit', 'GradesController@update')->name('edit-grade');
    Route::get('/grades/get-class/{id}', 'GradesController@getGradeClass')->name('list-grade');

    // Subjects
    Route::get('/subjects', 'SubjectsController@index')->name('list-subject');
    Route::get('/subjects/{id}/show', 'SubjectsController@show')->name('view-subject');
    Route::post('/add-subjects', 'SubjectsController@store')->name('add-subject');
    Route::get('/subjects/{id}/edit', 'SubjectsController@edit')->name('edit-subject');
    Route::get('subjects/create', 'SubjectsController@create')->name('add-subject');
    Route::get('/subjectsTotal', 'SubjectsController@subjectsTotal')->name('list-subject');
    Route::post('/edit-subjects/{id}', 'SubjectsController@update')->name('edit-subject');
    Route::post('/saveStudentMarks/{id}', 'SubjectsController@saveStudentMarks')->name('edit-subject');

    //add-ebook,view-ebook,download-ebook,edit-ebook,delete-ebook
    // EBooks
    Route::get('/ebooks', 'EBooksController@index')->name('list-student');
    Route::post('/add-ebooks', 'EBooksController@store')->name('add-ebook');
    Route::get('/ebooks/{id}/edit', 'EBooksController@edit')->name('edit-ebook');
    Route::get('/ebooks/create', 'EBooksController@create')->name('add-ebook');

    // students
    Route::get('/students', 'StudentsController@index')->name('list-student');
    Route::get('/students/create', 'StudentsController@create')->name('create-student');

    Route::post('/savePersonalInfo', 'StudentsController@savePersonalInfo')->name('create-student');
    Route::post('/saveNextOfKeen', 'StudentsController@saveNextOfKeen')->name('create-student');
    Route::post('/savePayments', 'StudentsController@savePayments')->name('create-student');
    Route::post('/saveSubjects', 'StudentsController@saveSubjects')->name('create-student');
    Route::get('/saveStudent', 'StudentsController@saveStudent')->name('create-student');
    Route::get('/students/{id}', 'StudentsController@show')->name('view-student');
    Route::get('/students/{id}/edit', 'StudentsController@edit');
    Route::get('/studentProfile/{id}', 'StudentsController@studentProfile')->name('academic-report');
    Route::get('/studentReport/{id}', 'StudentsController@academicReport')->name('academic-report');
    Route::post('/export-list', 'StudentsController@exportToPdf')->name('list-student');

    Route::post('/updatePersonalInfo/{id}', 'StudentsController@updatePersonalInfo');
    Route::post('/updateGurdain/{id}', 'StudentsController@updateNextOfKeen');
    Route::post('/updateFees/{id}', 'StudentsController@updatePayments');
    Route::post('/updateSubject/{id}', 'StudentsController@updateSubjects');




Route::get('/calender', 'CalenderController@index')->name('calender');
Route::post('/add-calender-event', 'CalenderController@store')->name('calender');
Route::get('/get-calender-events', 'CalenderController@getCalenderEvents')->name('calender');
Route::get('/Portal', 'PortalController@index')->name('portal');
Route::get('/profile/{id}/user', 'PortalController@profile')->name('profile');
});

Route::get('/login', 'UsersController@login')->name('login');
Route::post('/do-login', 'UsersController@doLogin')->name('do-login');
Route::get('/verify-account/{id}', 'UsersController@verifyAccount');
Route::post('/verify-account/{id}', 'UsersController@updateAccount');


Route::get('/no-allowed', function()
{
    return view('no-allowed');
});

Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'UsersController@redirectToFacebook');
Route::get('auth/facebook/callback', 'UsersController@handleFacebookCallback');
