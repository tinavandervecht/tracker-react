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

Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

Route::group(['namespace' => 'Bills'], function () {
    Route::resource('bills', 'BillsController');
});

Route::group(['namespace' => 'Ajax'], function () {
    Route::group(['namespace' => 'Bills'], function () {
        Route::post('/ajax/bills/{bill}/update', [
            'as' => 'ajax.bills.update', 'uses' => 'BillsController@update'
        ]);
    });
});
