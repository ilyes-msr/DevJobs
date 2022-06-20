<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

Route::get('/', [ListingController::class, 'index']);


Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);

Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::get('/hello', function () {
    return response('<h1>Hello world!</h1>');
});

Route::get('/posts/{id}', function ($id) {
//    dd($id);
//    ddd($id);
    return response('id = ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    return response($request->name . ' ' . $request->city);
});

