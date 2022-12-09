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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/communities', App\Http\Livewire\Community\Index::class)->name('admin.communities.index');
    Route::get('/collections', App\Http\Livewire\Collection\Index::class)->name('admin.collections.index');
    Route::get('/items', App\Http\Livewire\Item\Index::class)->name('admin.items.index');
});
