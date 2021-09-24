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

Route::get('/memberlist', function () {
    return view('memberlist');
});

Route::post('/registerMember', [App\Http\Controllers\RegistrationController::class, 'registerMember']);
Route::get('/updateMemberDetail', [App\Http\Controllers\UpdateMemberDetailController::class, 'updateMemberDetail']);
