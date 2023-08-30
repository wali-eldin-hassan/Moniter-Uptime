<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EndPointDestroyController;
use App\Http\Controllers\EndPointIndexController;
use App\Http\Controllers\EndPointStoreController;
use App\Http\Controllers\EndPointUpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteNotificationEmailDestroyController;
use App\Http\Controllers\SiteNotificationEmailStoreController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard/{site?}', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/sites', SiteController::class)->name('sites');

    Route::get('/endpoints/{endpoint}', EndPointIndexController::class);
    Route::post('/sites/{site}/endpoints', EndPointStoreController::class);
    Route::patch('/endpoints/{endpoint}', EndPointUpdateController::class);
    Route::delete('/endpoints/{endpoint}', EndPointDestroyController::class);
    Route::post('/sites/{site}/notification/emails', SiteNotificationEmailStoreController::class);
    Route::delete('/sites/{site}/notification/emails', SiteNotificationEmailDestroyController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
