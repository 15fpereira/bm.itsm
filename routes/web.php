<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;
Use App\Http\Controllers\AgendaController;

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


Route::resources([
    'chamados' => ChamadoController::class,
    'agendas' => AgendaController::class,
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/painel', function () {
    return view('painel');
})->middleware(['auth'])->name('painel');

require __DIR__.'/auth.php';
