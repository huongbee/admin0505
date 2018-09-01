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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('admin/register','AdminController@getRegister');
Route::post('admin/register','AdminController@postRegister')->name('postRegister');

Route::get('admin/login','AdminController@getLogin')->name('getLogin');
Route::post('admin/login','AdminController@postLogin')->name('postLogin');

Route::group(['middleware'=>'checklogin','prefix'=>'admin'],function(){

    // admin/
    Route::get('/','AdminController@index')->name('home');
    
    // admin/list-product
    Route::get('list-product/{idtype}','AdminController@getListProduct')->name('list-product');
    Route::get('edit-product/{id}','AdminController@getEditProduct')->name('edit-product');
    Route::post('edit-product/{id}','AdminController@postEditProduct')->name('post-edit-product');
    





    // admin/logout
    Route::get('logout','AdminController@logout')->name('logout');

});
