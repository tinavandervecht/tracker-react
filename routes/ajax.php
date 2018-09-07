<?php
Route::group(['namespace' => 'Bills'], function () {
    Route::post('/bills/{bill}/update', [
        'as' => 'bills.update', 'uses' => 'BillsController@update'
    ]);
});
