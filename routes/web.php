<?php

use App\Http\Resources\MemberCollection;
use App\Models\Member;
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

Route::get('/memberlist', [App\Http\Controllers\MemberController::class, 'index']);


Route::post('/registerMember', [App\Http\Controllers\RegistrationController::class, 'registerMember']);
Route::post('/updateMemberDetails', [App\Http\Controllers\UpdateMemberDetailController::class, 'updateMemberDetail']);
Route::get('/removeMember/{id}', [App\Http\Controllers\MemberController::class, 'removeMember']);

Route::get('/fetchMembers', function () {
    return MemberCollection::collection(Member::all());
});
