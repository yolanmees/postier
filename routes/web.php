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

Route::get('/test', function () {
    return view('test.index', ['title' => 'Test']);
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

Route::get('/collections', 'PostColController@index');
Route::get('/collections/v2', function () {
    return view('collections.index', ['title' => 'collections V2']);
});
Route::get('/collections/new', function () {
    return view('collections.new', ['title' => 'New collection']);
});
Route::get('/collections/postman', function () {
    return view('collections.postman', ['title' => 'New collection']);
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

/*
WORKFLOWS
*/

Route::get('/workflows', function () {
    return view('workflows.index', ['title' => 'Workflows']);
});
Route::get('/workflows/edit', function () {
    return view('workflows.index', ['title' => 'Workflows']);
});
Route::get('/workflows/editor', function () {
    return view('workflows.editor', ['title' => 'Workflows']);
});
//EDIT
Route::get('/workflows/renderHTML/{vendor}/{app}/{step}', function ($vendor, $app, $step) {
    return view('workflows.assets.editor.renderStepsHTML', ['vendor' => $vendor, 'app' => $app, 'step' => $step]);
});

//TESTER
Route::any('/workflows/test', function () {
    return view('workflows.assets.testWorkflow');
});

// NEW
Route::get('/workflows/new', function () {
    return view('workflows.new', ['title' => 'New workflow']);
});
Route::any('/workflows/create/initWorkflowDB', 'CreateWorkflowController@initWorkflowDB');

//EDIT
Route::get('/workflows/edit/load/{id}', function ($id) {
    return view('workflows.assets.loadWorkflow', ['id' => $id], ['title' => 'edit']);
});

Route::get('/workflows/edit/{id}', function ($id) {
    $name = DB::table('workflows')->where([['id', '=', $id]])->select('name')->get();

    return view('workflows.edit', ['id' => $id, 'extended_title' => '<b>Edit workflow: </b>'.$name[0]->name], ['title' => 'Edit workflow']);
});

Route::any('/workflows/find/requests', 'CreateWorkflowController@findRequest');

Route::any('/collections/getApps/ByCol/{appid}/{colid}', function ($appid, $colid) {
    $requests = DB::table('request')
                                ->where([
                                    ['collection_id', '=', $appid],
                                    ['collection_item_id', '=', $colid],
                                ])->get();

    return view('collections.requestsByCol', ['title' => 'Apps'], ['data' => $requests]);
});

/*
QUEU
*/

Route::get('/queu', function () {
    return view('queu.index', ['title' => 'Queu']);
});

/*
REPPORTING
*/

Route::get('/report', function () {
    return view('report.index', ['title' => 'Report']);
});

Route::get('/report/logs/requests', function () {
    return view('report.requests_logs', ['title' => 'Report: Requests Logs']);
});

/*
Classes for posts
*/

Route::any('/testConnection', 'Controller@testFuncs');

Route::any('/saveConnection', 'Controller@SaveConnToDB');

/*
SEARCH
*/

Route::any('/search/collections', 'SearchController@searchCollections');

/*
Settings en user prefferences
*/

Route::get('/settings', 'backendController@settings');
Route::get('/roles-and-permissions', 'backendController@roles');

/*
Login And Register
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
