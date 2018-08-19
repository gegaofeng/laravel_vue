<?php

use Illuminate\Http\Request;
use App\Article;

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

//Route::middleware('auth:api')->get('/user', function (Request $request)
//{
//    return $request->user();
//});
////Route::Middleware('auth:api')->get('/',function (){
////    return true;
////});
//
////Route::get('articles',function (){
////    //返回所有文章
////    return Article::all();
////});
////
////Route::get('articles/{id}',function ($id){
////    return Article::find($id);
////});
////
////Route::post('articles',function (Request $request){
////    return Article::create($request->all());
////});
////
////Route::put('articles/{id}',function (Request $request,$id){
////    $article=Article::findOrFail($id);
////    $article->update($request->all());
////    return $article;
////});
////
////Route::delete('articles/{id}',function ($id){
////    Article::find($id)->delete();
////    return 204;
////});
//Route::group(['middleware' => 'auth:api'], function ()
//{
//    Route::get('articles', 'ArticleController@index');
//    Route::get('articles/{article}', 'ArticleController@show');
//    Route::post('articles', 'ArticleController@store');
//    Route::put('articles/{article}', 'ArticleController@updade');
//    Route::delete('article/(article}', 'ArticleController@delete');
//});
//
///*
// *
// */
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
/*
 *
 */
//Route::post('auth/register',function (){return 'success';});
Route::post('auth/register','AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
});
Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'AuthController@refresh');
});