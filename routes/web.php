
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|create_register
*/
Route::get('/', 'LoginController@login');
Route::post('/', 'UserController@postlogin');
Route::get('/one_time_password/{id}', 'GoogleAuthController@one_time_password');
Route::post('/one_time_password/{id}', 'GoogleAuthController@post_one_time_password');
Route::get('/update_prf', 'GoogleAuthController@get_update_prf');
Route::post('/update_prf', 'GoogleAuthController@update_prf');
Route::get('/update_pw','UserController@get_update_pw');
Route::post('/update_pw','UserController@post_update_pw');
Route::get('/myregister', 'LoginController@register');
Route::post('/myregister', 'Auth\RegisterController@register');
Route::get('/creat_register', 'Auth\RegisterController@create_register');
Route::get('/home/{id}', 'HomeController@home');
Route::get('/homead', 'HomeController@homead');
Route::post('/home/{id}','HomeController@change');
Route::post('/homead','HomeController@changead');
Route::get('/admin_user', 'AdminUserController@index');
Route::get('/admin_thiet_bi', 'AdminThietBiController@index');
Route::get('/editus/{id}', 'AdminUserController@edit');
Route::PATCH('/updateus/{id}', 'AdminUserController@update');
Route::get('/edittb/{id}', 'AdminThietBiController@edit');
Route::PATCH('/updatetb/{id}', 'AdminThietBiController@update');
Route::get('/deleteus/{id}', 'AdminUserController@delete');
Route::get('/reset_pw/{id}', 'AdminUserController@reset_pw');
Route::post('/reset_pw/{id}', 'AdminUserController@post_reset_pw');
Route::get('/deletetb/{id}', 'AdminThietBiController@delete');
Route::post('/addus', 'AdminUserController@add');
Route::post('/addtb', 'AdminThietBiController@add');
Route::get('/connective','ConnectiveController@connective');

Route::get('/logout','UserController@logout' );
Route::get('/addcn_us/{id}','ConnectiveController@add_user_connect');

Auth::routes();
Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
Route::get('/chart', 'ChartController@index');
Route::get('/show_temperature', 'ChartController@show_temperature');
Route::post('/chart', 'ChartController@post_index');
Route::get('/logs', 'LogsController@index');
Route::get('/change_number', 'LogsController@change_number');
Route::get('/show_logs/{check}', 'LogsController@show_logs');
Route::get('/start_day', 'LogsController@start_day');
Route::get('/stop_day', 'LogsController@stop_day');

?>





