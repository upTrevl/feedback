<?php
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FileController;
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
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/registration', function () {
    return Inertia::render('Auth/Register');
})->name('registration');



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'tickets' => Auth::user()->tickets()->orderBy('created_at', 'DESC')->get()
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resources([
        'tickets' => TicketController::class,
        'files' => TicketController::class,
    ]);

});

require __DIR__.'/auth.php';
