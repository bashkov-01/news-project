<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/main', [\App\Http\Controllers\IndexController::class, 'Index'])->name('main');
Route::get('/main/rubric/{rubric}', [\App\Http\Controllers\IndexController::class, 'Rubric'])->name('RubricId');
Route::get('/main/statya/{statya}', [\App\Http\Controllers\IndexController::class, 'Statya'])->name('StatyaId');
Route::delete('/main/delete/{id}', [\App\Http\Controllers\IndexController::class, 'Delete'])->name('delete');
Route::get('/main/view/add', [\App\Http\Controllers\IndexController::class, 'View_Add']);
Route::post('/main/form/add', [\App\Http\Controllers\IndexController::class, 'Form_Add'])->name('add_news');
Route::get('/main/view/update/{id}', [\App\Http\Controllers\IndexController::class, 'View_Update'])->name('update');
Route::post('/main/form/update', [\App\Http\Controllers\IndexController::class, 'Form_Update'])->name('update_form');
Route::get('/main/warning', [\App\Http\Controllers\IndexController::class, 'Warning']);
