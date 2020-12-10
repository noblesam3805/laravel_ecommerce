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

Route::get('/', 'SiteController@site')->name('site');
Route::get('/view/{id}', 'SiteController@view');
Route::get('/delete/{id}', 'SiteController@delete');
Route::get('/edit/{id}', 'SiteController@edit');
Route::post('/update/{id}', 'SiteController@update');
Route::post('/updateqty/{id}', 'SiteController@updateqty');
Route::post('/updatestatus/{id}', 'SiteController@updatestatus');
Route::post('/settings/{id}', 'SiteController@psettings');
Route::get('/updateqtyv/{id}', 'SiteController@updateqtyv');
Route::get('/show/{id}', 'SiteController@show');
Route::post('/order', 'SiteController@order')->name('order');
Route::post('/add_to_cart/{id}',
['uses'=> 'SiteController@addtocart',
'as'=> 'addtocart']);
// Route::post('/order',
// ['uses'=> 'SiteController@order',
// 'as'=> 'order']);

// Route::get('/signin', function(){
//     return view('Auth/signin');
// });
// Route::get('/signup', function(){
//     return view('Auth/signup');
// });
Route::post('/signin', 'AuthController@signin')->name('signin');
Route::post('/signup', 'AuthController@signup')->name('signup');
Route::get('/m_c_orders', 'SiteController@m_c_orders')->middleware('auth');
Route::get('/u_c_orders', 'SiteController@u_c_orders')->middleware('auth');
Route::get('/u_p_orders', 'SiteController@u_p_orders')->middleware('auth');
Route::get('/usettings', 'SiteController@usettings')->middleware('auth');
Route::get('/settings', 'SiteController@settings')->middleware('auth');

Route::get('/m_p_orders', 'SiteController@m_p_orders')->middleware('auth');
Route::get('/a_c_orders', 'SiteController@a_c_orders')->middleware('auth');
Route::get('/a_p_orders', 'SiteController@a_p_orders')->middleware('auth');

Auth::routes(['verify' => true]);
Route::get('/upload_product', function () {
    return view('a_d_pages/upload_product');
});
Route::get('/shop', 'SiteController@shop');

Route::get('/cart', 'SiteController@cart')->middleware('auth');
Route::post('/upload', 'HomeController@upload')->name('upload');
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/logout', 'HomeController@logout')->name('logout');
