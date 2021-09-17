<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BolaSorteadaController;
use App\Http\Controllers\CartelaController;
use App\Http\Controllers\GanhadorController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\PremiacaoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['apiJWT']], function () {
    //user

    //Auth
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);

//    Route::resource('premiacao', PremiacaoController::class);
    Route::get('premiacao-user', [PremiacaoController::class, 'premiacaoUser']);

    //Partida
    Route::resource('premiacao', PremiacaoController::class);
    Route::resource('user', UserController::class);
    Route::resource('partida', PartidaController::class);
    Route::get('partida-premiacao', [PartidaController::class, 'premiacaoPartida']);
    Route::resource('bolasorteada', BolaSorteadaController::class);
    Route::get('bola/{id}', [BolaSorteadaController::class, 'statusBola']);

    //Cartelas
    Route::resource('cartela', CartelaController::class);
    Route::get('minhasCartelas/{id}', [CartelaController::class, 'minhasCartelas']);
    Route::get('bolassorteadas/{partida}', [CartelaController::class, 'bolasSorteadas']);

    //Home Estatisticas
    Route::get('quantidadeJogador',[UserController::class, 'quantidadeJogador']);
    Route::get('quantidadeCartelas',[CartelaController::class, 'quantidadecartela']);
    Route::get('valorreceita',[PremiacaoController::class, 'valorreceita']);

    //Historico
    Route::get('historico', [HistoricoController::class, 'index']);

    //Ganhadores
    Route::resource('ganhadores', GanhadorController::class);
    Route::get('ganhadores-dupla/{id}', [GanhadorController::class, 'linhaDupla']);
    Route::get('ganhador-user/{id}', [GanhadorController::class, 'ganhadorUser']);

});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('bingo', [CartelaController::class, 'bingo']);
