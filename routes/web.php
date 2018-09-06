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
Posts
*/

Route::get('/posts', function () {
    return view('pages.posts', ['title' => 'Posts']);
});


/*
Classes for posts
*/

Route::any('/testConnection', 'TestConnection@tester');

Route::any('/saveConnection', 'saveConnection@SaveConnToDB');
