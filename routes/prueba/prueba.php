<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('user', function () {
//     return Inertia::render('User');
// })->name('user.index');

// Route::middleware(['auth:sanctum', 'verified'])->get('pdf', function () {
//     return Inertia::render('Pdf');
// })->name('pdf.index');

Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard/pdf',PdfController::class);
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/subir',[PdfController::class,'subir']);

Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard/user',UserController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/prueba1',[UserController::class,'primer_intento']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/prueba2',[UserController::class,'segundo_intento']);