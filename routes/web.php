<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato.post');

Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class, 'sobrenos'])->name('site.sobrenos');

Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar.post');
    Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::resource('produto', App\Http\Controllers\ProdutoController::class);
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ser direcionado para a página principal.';
});