<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MarketplaceController;
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
    return to_route('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::get('/uikit', function () {
      return view('uikit');
  });
  Route::prefix('apps')->group(function () {
    Route::get('/', [AppController::class, 'list'])->name('apps.list');
    Route::get('/new', [AppController::class, 'new'])->name('apps.new');
    Route::get('/add', [AppController::class, 'add'])->name('apps.add');
    Route::post('/create', [AppController::class, 'create'])->name('apps.create');
    Route::get('/import', [AppController::class, 'import'])->name('apps.import');
    Route::get('{id}/edit', [AppController::class, 'edit'])->name('apps.edit');
    Route::post('/save', [AppController::class, 'save'])->name('apps.save');
  });
  Route::prefix('marketplace')->group(function () {
    Route::get('/', [MarketplaceController::class, 'home'])->name('marketplace');
    Route::get('/', [MarketplaceController::class, 'home'])->name('marketplace.home');
  });
  Route::prefix('connections')->group(function () {
    Route::get('/', [AppController::class, 'list'])->name('connections.list');
    Route::get('/new', [AppController::class, 'new'])->name('connections.new');
    Route::get('/edit/{id}', [AppController::class, 'edit'])->name('connections.edit');
    Route::get('/save', [AppController::class, 'save'])->name('connections.save');
  });
  Route::prefix('workflows')->group(function () {
    Route::get('/', [WorkflowController::class, 'list'])->name('workflows.list');
    Route::get('/new', [WorkflowController::class, 'new'])->name('workflows.new');
    Route::get('/edit/{id}', [WorkflowController::class, 'edit'])->name('workflows.edit');
    Route::get('/save', [WorkflowController::class, 'save'])->name('workflows.save');
  });
  Route::prefix('queue')->group(function () {
    Route::get('/', [QueueController::class, 'list'])->name('queue.list');
    Route::get('/new', [QueueController::class, 'new'])->name('queue.new');
    Route::get('/edit/{id}', [QueueController::class, 'edit'])->name('queue.edit');
    Route::get('/save', [QueueController::class, 'save'])->name('queue.save');
  });
  Route::prefix('reports')->group(function () {
    Route::get('/', [ReportController::class, 'list'])->name('reports.list');
    Route::get('/new', [ReportController::class, 'new'])->name('reports.new');
    Route::get('/edit/{id}', [ReportController::class, 'edit'])->name('reports.edit');
    Route::get('/save', [AppController::class, 'save'])->name('reports.save');
  });
  Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'list'])->name('settings.list');
    Route::get('/new', [SettingController::class, 'new'])->name('settings.new');
    Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::get('/save', [SettingController::class, 'save'])->name('settings.save');
  });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
