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
use App\Models\Member;
Route::get('/', function () {
//    return Member::all();

    return view('login');
});
//Route::get('/','Member\MemberController@index');

Route::get('/register','View\MemberController@toRegister');
Route::get('/login','View\MemberController@toLogin');
Route::get('/product/category_id/{category_id}','View\BookController@toProduct');
Route::get('/product/{product_id}','View\BookController@toPdtContent');
Route::get('category','View\BookController@toCategory' );
Route::group(['prefix'=>'service'],function(){
    Route::get('validate_code/create','Service\ValidateController@create');
    Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
    Route::any('validate_email', 'Service\ValidateController@validateEmail');
    Route::post('register', 'Service\MemberController@register');
    Route::post('login', 'Service\MemberController@login');
    Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
    Route::get('/cart/add/{product_id}', 'Service\CartController@addCart');
});
