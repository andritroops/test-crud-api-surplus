<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\IndexController AS GetCategory;
use App\Http\Controllers\Category\StoreController AS StoreCategory;
use App\Http\Controllers\Category\EditController AS EditCategory;
use App\Http\Controllers\Category\UpdateController AS UpdateCategory;
use App\Http\Controllers\Category\DeleteController AS DeleteCategory;
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
// Category
Route::get('/categories', GetCategory::class);
Route::post('/categories', StoreCategory::class);
Route::get('/categories/{id}', EditCategory::class);
Route::put('/categories/{id}', UpdateCategory::class);
Route::delete('/categories/{id}', DeleteCategory::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
