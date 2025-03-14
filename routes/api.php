<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CourseController;

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

Route::middleware('auth:sanctum')->post('/user/profile-photo', [
  AuthController::class,
  'updateProfilePhoto',
]);

Route::post('/user/delete-photo', [
  AuthController::class,
  'deleteProfilePhoto',
])->middleware('auth');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/notes', [NoteController::class, 'saveNote']);
  Route::get('/notes', [NoteController::class, 'getNotes']);
  Route::get('/notes/{date}', [NoteController::class, 'show']);
});
