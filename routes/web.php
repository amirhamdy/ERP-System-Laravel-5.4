<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/temp', 'HomeController@temp')->name('temp');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('customers', 'CustomerController');
    Route::resource('productlines', 'ProductlineController');
    Route::resource('projects', 'ProjectController');
    Route::resource('jobs', 'JobController');
    Route::resource('tasks', 'TaskController');
    Route::resource('pricebooks', 'PricebookController');
    Route::resource('invoices', 'InvoiceController');

    Route::post('/getPricebooks', 'PricebookController@getPricebooks');
    Route::post('/getProductlines', 'ProductlineController@getProductlines');
    Route::post('/getProjects', 'ProjectController@getProjects');
    Route::post('/calculateJobPrice', 'JobController@calculateJobPrice');

});


