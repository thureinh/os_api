<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
	Route::apiresource('brands', 'Api\BrandController');
	Route::apiresource('categories', 'Api\CategoryController');
	Route::apiresource('subcategories', 'Api\SubcategoryController');
	Route::get('items/filter', 'Api\ItemController@filter');
	Route::apiresource('items', 'Api\ItemController');
	Route::post('register', 'Api\UserController@register');
	Route::apiresource('users', 'Api\UserController');
	Route::apiresource('orders', 'Api\OrderController');
});