<?php
use Illuminate\Support\Facades\Input;

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




Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => 'auth'], function(){

    //Create
    Route::get('/questions/create','QuestionsController@createPublic')->name("crearPregunta");
    Route::post('/questions/create', 'QuestionsController@store');
    Route::post('/questions/{slug}/comments', 'CommentsController@store');

    //Read


    Route::get('/questions/{question}', 'QuestionsController@show');




    Route::get('/questions/edit/{slug}', 'QuestionsController@edit')->name('question.edit');
    Route::patch('/questions/update/{slug}', 'QuestionsController@patch')->name('question.patch');

    //Delete
    Route::delete('/questions/destroy/{id}', 'QuestionsController@destroy')->name("deleteElement");

    //Profile
    Route::get('/user/{user}', 'UserController@show')->name("profile");
    Route::get ('/user/edit/{user}', 'UserController@editPublic')->name("settingsPublic");
    Route::patch('user/edit/{user}/update', 'UserController@update');



            //Admin routes
            Route::get('/admin', 'AdminController@index')->name('admin.panel');

            Route::get('/admin/questions', 'QuestionsController@adminIndex')->name('admin.questions');
            Route::get('/admin/questions/create', 'QuestionsController@create');
            Route::post('/admin/questions', 'QuestionsController@store');
            Route::get ('/admin/user/edit/{user}', 'UserController@editAdmin')->name("settings");
            Route::get('/admin/questions/{slug}/edit', 'QuestionsController@edit')->name('admin.question.edit');
            Route::patch('/admin/questions/{slug}', 'QuestionsController@patch')->name('admin.question.patch');



});

    Route::post('/questions/validate','QuestionsController@validarAjax');
    Route::get('/questions','QuestionsController@show');




