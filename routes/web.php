<?php

use \App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('/items', App\Http\Livewire\Item\Index::class)->name('items.index');
Route::get('/shelf/{shelf}/items', App\Http\Livewire\Shelf\Show::class)->name('shelf.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('can:read')->get('/shelves', App\Http\Livewire\Shelf\Index::class)->name('admin.shelf.index');
    Route::middleware('can:shelf.create')->get('/shelves/create', App\Http\Livewire\Shelf\Create::class)->name('admin.shelf.create');
    Route::middleware('can:shelf.edit')->get('/shelves/{shelf}/edit', App\Http\Livewire\Shelf\Edit::class)->name('admin.shelf.edit');

});
