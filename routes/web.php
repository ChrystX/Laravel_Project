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

Route::group(['middleware' => ['guest']], function (){
    Route::get('/', 'PageController@loginpage')->name('login');
    Route::post('/login/new', 'PageController@login')->name('login');
    Route::get('password/forgot', 'PageController@reset')->name('password.forgot');
    Route::post('password/reset', 'PageController@resetPassword')->name('password.reset');
});

Route::group(['middleware'=>["auth"]], function(){
Route::get("/home", "PageController@home");
Route::get("/faq", "PageController@faq");
Route::get("/masterdata", "PageController@masterdata");
Route::get("/about", "PageController@about");
Route::post('/save',  "PageController@saveproducts");
Route::post('/delete/{product_id}', "PageController@deleteproduct")->name('delete.product');
Route::get('/edit/{product_id}', "PageController@editProduct")->name('edit.product');
Route::put('/update/{product_id}', "PageController@updateproduct")->name('update.product');
Route::get("/register", "PageController@registrationpage");
Route::post("/register/new", "PageController@register")->name('register');
Route::get("/userupdate", "PageController@vetted");
Route::post("/change", "PageController@changePassword");
Route::post('/logout', 'PageController@logout')->name('logout');
});
// Route::group(['middleware' => ['auth.custom']], function() {
//     Route::get('/userupdate', 'PageController@edituser')->name('edituser');
//     Route::post('/userupdate', 'PageController@changePassword')->name('changePassword');
// });