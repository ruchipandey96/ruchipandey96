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
Route::get('cardList','CardManagementController@index');
Route::get('createCard','CardManagementController@cardForm');
Route::post('storeCard','CardManagementController@storeCardData');
Route::get('viewCard','CardManagementController@viewCard');
Route::get('editCard','CardManagementController@editCard');
Route::get('deleteCard','CardManagementController@deleteCard');
Route::post('updateCard','CardManagementController@updateCard');