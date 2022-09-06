<?php

use App\Http\Controllers\ContestantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Livewire\Contestants;
use App\Http\Livewire\Draw;
use App\Models\Contestant;
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

Route::get('/', [HomepageController::class, 'index']);
Route::get('details/{id}', [HomepageController::class, 'details'])->name('details.id');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::middleware('auth:web')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/fetch/prize', [HomeController::class, 'fetchPrize'])->name('prize.fetch');

    Route::get('/create/prize', [HomeController::class, 'create'])->name('prize.create');
    Route::post('/store/prize', [HomeController::class, 'store'])->name('prize.store');

    Route::get('/edit/prize/{prize}', [HomeController::class, 'edit'])->name('prize.edit');
    Route::post('/update/prize/{id}', [HomeController::class, 'update'])->name('prize.update');
    Route::get('/delete/prize/{id}', [HomeController::class, 'delete'])->name('prize.delete');

    Route::get('/show/images/{id}', [ImageController::class, 'show'])->name('image.show');
    Route::post('/upload/images/{id}', [ImageController::class, 'upload'])->name('image.upload');
    Route::get('/delete/images/{id}', [ImageController::class, 'destroy'])->name('image.delete');

    Route::get('/contestant', Contestants::class)->name('contestant.index');

    Route::get('/draw', Draw::class)->name('draw.index');
});
