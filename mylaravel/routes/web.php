<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', 'App\Http\Controllers\TestController@test');
Route::get('/test_two', function () {
    return "[{\"id\":1,\"name\":\"Pavel\",\"email\":\"pavel@test.com\",\"email_verified_at\":\"2020-12-24 15:46:54\",\"password\":\"12341234\",\"remember_token\":\"sdfwewe2d\",\"created_at\":\"2020-12-24T15:47:01.000000Z\",\"updated_at\":\"2020-12-24T15:47:05.000000Z\"},{\"id\":2,\"name\":\"Kirill\",\"email\":\"sdfsd\",\"email_verified_at\":null,\"password\":\"3434345345\",\"remember_token\":\"fgfg\",\"created_at\":null,\"updated_at\":null}]";
});
