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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/contacts', 'ContactsController@index')->name('contacts');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts/{contact}', 'ContactsController@show')->name('contact');
Route::get('/contacts/{contact}/form', 'ContactsController@form')->name('contact_form');
Route::get('/contact/add', 'ContactsController@add')->name('contact_add');
Route::get('/contact/{contact}/edit', 'ContactsController@edit')->name('contact_edit');
Route::post('/contacts/{contact}', 'ContactsController@destroy')->name('cont_destroy');



