<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadImageController;
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

/* ログイン中のみアクセスできるルーティングのサンプル */
Route::get('/users_only', function(){
    return view('users_only');
})->middleware('auth'); /* auth ミドルウェアが認証状態を判定してくれる */

/* 仮登録状態のユーザーに、メールのリンクをクリックする案内を表示する画面のルーティング */
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('upload_form', function () {
    return view('upload_form');
})->middleware('auth')->name('verification.notice');

Route::post('upload_form',  [UploadImageController::class, 'upload']
)->middleware('auth')->name('verification.notice');

Route::get('upload_images', [UploadImageController::class, 'index']);

Route::post('/upload_images/delete/{id}', [UploadImageController::class, 'delete']);

Route::get('/upload_images/edit/{id}', [UploadImageController::class, 'edit']);

Route::post('/upload_images/edit/{id}', [UploadImageController::class, 'update']);

Route::get('tailwind-sample', function(){
    return view('tailwind-sample');
});

require __DIR__.'/auth.php';
