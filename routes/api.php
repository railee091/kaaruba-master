<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UsersController::class, 'store']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('members', MembersController::class);
    Route::resource('users', UsersController::class);
    Route::get('logout', [AuthController::class, 'logout']);
});


// Route::get('/memberlist', [App\Http\Controllers\MemberController::class, 'index']);


// Route::post('registerMember', [App\Http\Controllers\RegistrationController::class, 'registerMember']);
// Route::post('updateMemberDetails', [App\Http\Controllers\UpdateMemberDetailController::class, 'updateMemberDetail']);
// Route::get('removeMember/{id}', [App\Http\Controllers\MemberController::class, 'removeMember']);
Route::get('/token', function () {
    return csrf_token();
});
