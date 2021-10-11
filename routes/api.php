<?php

use App\Http\Resources\MemberCollection;
use App\Models\Member;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/memberlist', [App\Http\Controllers\MemberController::class, 'index']);


Route::post('registerMember', [App\Http\Controllers\RegistrationController::class, 'registerMember']);
Route::post('updateMemberDetails', [App\Http\Controllers\UpdateMemberDetailController::class, 'updateMemberDetail']);
Route::get('removeMember/{id}', [App\Http\Controllers\MemberController::class, 'removeMember']);

Route::get('fetchMembers', function () {
    return MemberCollection::collection(Member::all());
});
