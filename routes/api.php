<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

});
Route::get('/members', [MemberController::class, 'index']);
Route::post('/members', [MemberController::class, 'store']);
Route::put('/members/{id}', [MemberController::class, 'update']);


Route::get('/worker-categories', function () {
    return response()->json(config('worker_categories'));
});


Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test-cors', function () {
    return response()->json(['message' => 'CORS is working, fuck demon!']);
});
