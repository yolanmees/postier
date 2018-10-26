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

Route::get('/', function () {
    return view('pages.home', ['title' => 'Dashboard']);
});

/*
Connections
*/

Route::get('/connections', function () {
    return view('pages.connections', ['title' => 'Connections']);
});

Route::get('/connections/new', function () {
    return view('pages.connections.connection', ['title' => 'New connection']);
});

Route::get('/connections/{id}', function ($id) {
    $app_name = DB::table('apps')->where('app_id', $id)->value('app_name');
    return view('pages.connections.connection', ['title' => $app_name]);
});

/*
Collections
*/

Route::get('/collections', function () {
    return view('pages.collections', ['title' => 'collections']);
});
Route::get('/collections/new', function () {

    return view('collections.new', ['title' => 'New collection']);
});
Route::any('/collection/save/collection', 'PostColController@insertCollection');
Route::any('/collection/save/col', 'PostColController@insertCol');
Route::any('/collection/save/request', 'PostColController@insertRequest');
Route::any('/collection/save/headers', 'PostColController@insertHeaders');
Route::any('/collection/save/env', 'PostColController@insertEnv');


/*
APPS
*/

Route::get('/apps', function () {
    return view('pages.apps', ['title' => 'Apps']);
});

Route::get('/apps/new', function () {
    return view('pages.apps.new', ['title' => 'New App']);
});

Route::any('/collections/getApps/ByCol/{appid}/{colid}', function ($appid, $colid) {
    $requests = DB::table('request')
                                ->where([
                                  ['collection_id', '=', $appid],
                                  ['collection_item_id', '=', $colid]
                                ])->get();
    return view('collections.requestsByCol', ['title' => 'Apps'], ['data' => $requests]);
});

/*
Posts
*/

Route::get('/posts', function () {
    return view('pages.posts', ['title' => 'Posts']);
});

/*
Classes for posts
*/

Route::any('/testConnection', 'Controller@testFuncs');

Route::any('/saveConnection', 'Controller@SaveConnToDB');


/*
Settings en user prefferences
*/

Route::get('/settings', function () {
    return view('pages.settings', ['title' => 'Settings']);
});


/*
Login And Register
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
