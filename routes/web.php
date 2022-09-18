<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;
Use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthChamadoController;
use App\Http\Controllers\Auth\PerfilController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicoController;

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
//roteamento do welcome interno e acessivel somente com autenticação.
Route::get('/', function () {
    return view('welcome');
})->middleware(['auth'])->name('/');


//Route::get('/meuschamados', [UserController::class, 'index']);
Route::resource('meuschamados', AuthChamadoController::class);

// resource sem "s"
Route::resource('perfil', PerfilController::class);
// resources com "s"
Route::resources([
    'chamados' => ChamadoController::class,
    'agendas' => AgendaController::class,
]);

Route::resources([
    'portfolios' => PortfolioController::class,
    'servicos' => ServicoController::class,
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//roteamento do painel interno e acessivel somente com autenticação.
Route::get('/painel', function () {
    return view('painel');
})->middleware(['auth'])->name('painel');

require __DIR__.'/auth.php';
// roteamento do select dinâmico
Route::get('selects/{id}/servico','App\Http\Controllers\AuthChamadoController@getselect');
