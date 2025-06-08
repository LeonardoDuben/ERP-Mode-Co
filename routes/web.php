<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
//use App\Http\Controllers\Controller;

Route::get('/', [SiteController::class, 'principal'])->name('site.principal');
Route::get('/cadastro', [SiteController::class, 'showCadastro']);#->name('site.principal');
Route::post('/cadastro',[SiteController::class, 'cadastro'])->name('site.cadastro');
Route::get('/produtos', [SiteController::class, 'listar'])->name('site.produtos');

Route::post('/carrinho/adicionar', [SiteController::class, 'adicionarCarrinho'])->name('site.carrinho_adicionar');
Route::get('/carrinho', [SiteController::class, 'mostrarCarrinho'])->name('site.carrinho');