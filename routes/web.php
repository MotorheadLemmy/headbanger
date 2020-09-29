<?php

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


Route::get('/','MainController@index');
Route::get('/news','MainController@news');
Route::get('/interviews','MainController@interviews');
Route::get('/reviews','MainController@reviews');
Route::get('/contacts','MainController@contacts');
Route::get('/reviews/{slug}','MainController@review');
Route::get('/news/{slug}','MainController@onenews');
Route::get('/interviews/{slug}','MainController@interview');
Route::get('/buy','MainController@showShirts');
Route::get('/buy/{slug}','MainController@oneShirt');

Route::post('/news/{slug}','MainController@getCommentNews');
Route::post('/review/{slug}','MainController@getCommentReview');
Route::post('/interview/{slug}','MainController@getCommentInterview');

Route::get('/search','MainController@getResults')->name('search.results');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group([
	'prefix'=>'/admin',
	'namespace'=>'Admin',
	'middleware'=>['auth','admin']

],function(){

Route::get('/','AdminController@index');
Route::resource('/news','NewsController');
Route::resource('/review','ReviewController');
Route::resource('/shirt','ShirtController');
Route::resource('/interview','InterviewController');
Route::resource('/comment','CommentController');
});

Route::post('/cart/add','CartController@add');
Route::post('/cart/clear','CartController@clear');
Route::post('/cart/remove','CartController@remove');
Route::get('/checkout','CartController@checkout');
Route::get('/end-checkout','CartController@endCheckout');





Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });