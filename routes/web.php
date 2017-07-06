<?php

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

use App\Product;

Route::get('/', 'OrdersController@index');

Route::get('/findProductNameByCategory/{id}', 'OrdersController@useAjax1');
Route::get('/findProductNameByCategoryAndSupplier/{category_id}/{sup_id}', 'OrdersController@useAjax2');
Route::get('/findProductPriceById/{prod_id}', 'OrdersController@useAjaxForPrice');
Route::post('/order','OrdersController@storeRecords');
Route::get('/details','OrdersController@showDetails');
//Route::post('/search','OrdersController@showDetails');
Route::get('/paginate/{pageNum}','OrdersController@showDetailsJson');
Route::get('/paginateSearch/{query_name}/{pageNum}','OrdersController@showDetailsSearchJson');







//Route::get('/', function () {
//    return view('welcome');
//});
