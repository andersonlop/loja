<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
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
	return view('site.home');
})->name('site.home');




//Route::get('/home',                                 [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//////////////////////////// ROTAS USUÁRIO/////////////////////////////////////////////////////////
Route::middleware(['auth','check.funcionario'])->prefix('usuario')->group(function() {
    Route::get('/',                              [App\Http\Controllers\Crud\TipoUsuarioController::class, 'index'])->name('Usuario');
    Route::get('create',                         [App\Http\Controllers\Crud\TipoUsuarioController::class, 'create'])->name('Usuario.create');
    Route::post('post',                          [App\Http\Controllers\Crud\TipoUsuarioController::class, 'post'])->name('Usuario.post');
    Route::get('edit/{COD_USUARIO}',             [App\Http\Controllers\Crud\TipoUsuarioController::class, 'edit'])->name('Usuario.edit');
    Route::post('update',                        [App\Http\Controllers\Crud\TipoUsuarioController::class, 'update'])->name('Usuario.update');
    Route::get('delete/{COD_USUARIO}',           [App\Http\Controllers\Crud\TipoUsuarioController::class, 'delete'])->name('Usuario.delete');
    Route::post('delete',                        [App\Http\Controllers\Crud\TipoUsuarioController::class, 'erase'])->name('Usuario.deletePost');
});

//////////////////////////// ROTAS TIPO USUÁRIO/////////////////////////////////////////////////////////
Route::middleware(['auth','check.funcionario'])->prefix('tipo-usuario')->group(function() {
    Route::get('/',                             [App\Http\Controllers\Crud\TipoUsuarioController::class, 'index'])->name('TipoUsuario');
    Route::get('create',                        [App\Http\Controllers\Crud\TipoUsuarioController::class, 'create'])->name('TipoUsuario.create');
    Route::post('post',                         [App\Http\Controllers\Crud\TipoUsuarioController::class, 'post'])->name('TipoUsuario.post');
    Route::get('edit/{COD_TIPO_USUARIO}',       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'edit'])->name('TipoUsuario.edit');
    Route::post('update',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'update'])->name('TipoUsuario.update');
    Route::get('delete/{COD_TIPO_USUARIO}',     [App\Http\Controllers\Crud\TipoUsuarioController::class, 'delete'])->name('TipoUsuario.delete');
    Route::post('delete',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'erase'])->name('TipoUsuario.deletePost');
});

    //////////////////////////// ROTAS SITUAÇÃO COMPRA/////////////////////////////////////////////////////////
Route::middleware(['auth'])->prefix('situacao-compra')->group(function() {
    Route::get('/',                             [App\Http\Controllers\Crud\GrupoController::class, 'index'])->name('SituacaoCompra');
    Route::get('create',                        [App\Http\Controllers\Crud\GrupoController::class, 'create'])->name('SituacaoCompra.create');
    Route::post('post',                         [App\Http\Controllers\Crud\GrupoController::class, 'post'])->name('SituacaoCompra.post');
    Route::get('edit/{COD_SITUACAO_COMPRA}',    [App\Http\Controllers\Crud\GrupoController::class, 'edit'])->name('SituacaoCompra.edit');
    Route::post('update',                       [App\Http\Controllers\Crud\GrupoController::class, 'update'])->name('SituacaoCompra.update');
    Route::get('delete/{COD_SITUACAO_COMPRA}',  [App\Http\Controllers\Crud\GrupoController::class, 'delete'])->name('SituacaoCompra.delete');
    Route::post('delete',                       [App\Http\Controllers\Crud\GrupoController::class, 'erase'])->name('SituacaoCompra.deletePost');
});

    //////////////////////////// ROTAS PROMOÇÃO/////////////////////////////////////////////////////////
Route::middleware(['auth','check.funcionario'])->prefix('produto')->group(function() {
    Route::get('/',                             [App\Http\Controllers\Crud\TipoUsuarioController::class, 'index'])->name('Produto');
    Route::get('create',                        [App\Http\Controllers\Crud\TipoUsuarioController::class, 'create'])->name('Produto.create');
    Route::post('post',                         [App\Http\Controllers\Crud\TipoUsuarioController::class, 'post'])->name('Produto.post');
    Route::get('edit/{COD_PRODUTO}',            [App\Http\Controllers\Crud\TipoUsuarioController::class, 'edit'])->name('Produto.edit');
    Route::post('update',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'update'])->name('Produto.update');
    Route::get('delete/{COD_PRODUTO}',          [App\Http\Controllers\Crud\TipoUsuarioController::class, 'delete'])->name('Produto.delete');
    Route::post('delete',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'erase'])->name('Produto.deletePost');
});
        //////////////////////////// ROTAS PRODUTO/////////////////////////////////////////////////////////
Route::middleware(['auth','check.funcionario'])->prefix('produto')->group(function() {
    Route::get('/',                             [App\Http\Controllers\Crud\TipoUsuarioController::class, 'index'])->name('Produto');
    Route::get('create',                        [App\Http\Controllers\Crud\TipoUsuarioController::class, 'create'])->name('Produto.create');
    Route::post('post',                         [App\Http\Controllers\Crud\TipoUsuarioController::class, 'post'])->name('Produto.post');
    Route::get('edit/{COD_PRODUTO}',            [App\Http\Controllers\Crud\TipoUsuarioController::class, 'edit'])->name('Produto.edit');
    Route::post('update',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'update'])->name('Produto.update');
    Route::get('delete/{COD_PRODUTO}',          [App\Http\Controllers\Crud\TipoUsuarioController::class, 'delete'])->name('Produto.delete');
    Route::post('delete',                       [App\Http\Controllers\Crud\TipoUsuarioController::class, 'erase'])->name('Produto.deletePost');
});

            //////////////////////////// ROTAS GRUPO/////////////////////////////////////////////////////////
Route::middleware(['auth', 'check.funcionario'])->prefix('grupo')->group(function() {
    Route::get('/',                           [App\Http\Controllers\Crud\GrupoController::class, 'index'])->name('Grupo');
    Route::get('create',                      [App\Http\Controllers\Crud\GrupoController::class, 'create'])->name('Grupo.create');
    Route::post('post',                       [App\Http\Controllers\Crud\GrupoController::class, 'post'])->name('Grupo.post');
    Route::get('edit/{COD_GRUPO}',            [App\Http\Controllers\Crud\GrupoController::class, 'edit'])->name('Grupo.edit');
    Route::post('update',                     [App\Http\Controllers\Crud\GrupoController::class, 'update'])->name('Grupo.update');
    Route::get('delete/{COD_GRUPO}',          [App\Http\Controllers\Crud\GrupoController::class, 'delete'])->name('Grupo.delete');
    Route::post('delete',                     [App\Http\Controllers\Crud\GrupoController::class, 'erase'])->name('Grupo.deletePost');
});

                //////////////////////////// ROTAS FABRICANTE/////////////////////////////////////////////////////////
Route::middleware(['auth', 'check.funcionario'])->prefix('fabricante')->group(function() {
    Route::get('/',                           [App\Http\Controllers\Crud\FabricanteController::class, 'index'])->name('Fabricante');
    Route::get('create',                      [App\Http\Controllers\Crud\FabricanteController::class, 'create'])->name('Fabricante.create');
    Route::post('post',                       [App\Http\Controllers\Crud\FabricanteController::class, 'post'])->name('Fabricante.post');
    Route::get('edit/{COD_FABRICANTE}',       [App\Http\Controllers\Crud\FabricanteController::class, 'edit'])->name('Fabricante.edit');
    Route::post('update',                     [App\Http\Controllers\Crud\FabricanteController::class, 'update'])->name('Fabricante.update');
    Route::get('delete/{COD_FABRICANTE}',     [App\Http\Controllers\Crud\FabricanteController::class, 'delete'])->name('Fabricante.delete');
    Route::post('delete',                     [App\Http\Controllers\Crud\FabricanteController::class, 'erase'])->name('Fabricante.deletePost');
});

                    //////////////////////////// ROTAS DEPARTAMENTO/////////////////////////////////////////////////////////
Route::middleware(['auth', 'check.funcionario'])->prefix('departamento')->group(function() {
    Route::get('/',                           [App\Http\Controllers\Crud\DepartamentoController::class, 'index'])->name('Departamento');
    Route::get('create',                      [App\Http\Controllers\Crud\DepartamentoController::class, 'create'])->name('Departamento.create');
    Route::post('post',                       [App\Http\Controllers\Crud\DepartamentoController::class, 'post'])->name('Departamento.post');
    Route::get('edit/{COD_DEPARTAMENTO}',     [App\Http\Controllers\Crud\DepartamentoController::class, 'edit'])->name('Departamento.edit');
    Route::post('update',                     [App\Http\Controllers\Crud\DepartamentoController::class, 'update'])->name('Departamento.update');
    Route::get('delete/{COD_DEPARTAMENTO}',   [App\Http\Controllers\Crud\DepartamentoController::class, 'delete'])->name('Departamento.delete');
    Route::post('delete',                     [App\Http\Controllers\Crud\DepartamentoController::class, 'erase'])->name('Departamento.deletePost');
});

                        //////////////////////////// ROTAS CONDIÇÃO DE PAGAMENTO/////////////////////////////////////////////////////////
Route::middleware(['auth','check.gerente'])->prefix('condicao-pagamento')->group(function() {
    Route::get('/',                                 [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'index'])->name('CondicaoPagamento');
    Route::get('create',                            [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'create'])->name('CondicaoPagamento.create');
    Route::post('post',                             [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'post'])->name('CondicaoPagamento.post');
    Route::get('edit/{COD_CONDICAO_PAGAMENTO}',     [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'edit'])->name('CondicaoPagamento.edit');
    Route::post('update',                           [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'update'])->name('CondicaoPagamento.update');
    Route::get('delete/{COD_CONDICAO_PAGAMENTO}',   [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'delete'])->name('CondicaoPagamento.delete');
    Route::post('delete',                           [App\Http\Controllers\Crud\CondicaoPagamentoController::class, 'erase'])->name('CondicaoPagamento.deletePost');
});

    //////////////////////////// ROTAS CLIENTE/////////////////////////////////////////////////////////
Route::middleware(['auth','check.funcionario'])->prefix('cliente')->group(function() {
    Route::get('/',                                 [App\Http\Controllers\Crud\TipoUsuarioController::class, 'index'])->name('Cliente');
    Route::get('create',                            [App\Http\Controllers\Crud\TipoUsuarioController::class, 'create'])->name('Cliente.create');
    Route::post('post',                             [App\Http\Controllers\Crud\TipoUsuarioController::class, 'post'])->name('Cliente.post');
    Route::get('edit/{COD_CLIENTE}',                [App\Http\Controllers\Crud\TipoUsuarioController::class, 'edit'])->name('Cliente.edit');
    Route::post('update',                           [App\Http\Controllers\Crud\TipoUsuarioController::class, 'update'])->name('Cliente.update');
    Route::get('delete/{COD_CLIENTE}',              [App\Http\Controllers\Crud\TipoUsuarioController::class, 'delete'])->name('Cliente.delete');
    Route::post('delete',                           [App\Http\Controllers\Crud\TipoUsuarioController::class, 'erase'])->name('Cliente.deletePost');
});

        //////////////////////////// CATEGORIA/////////////////////////////////////////////////////////
Route::middleware(['auth', 'check.funcionario'])->prefix('categoria')->group(function() {
    Route::get('/',                                 [App\Http\Controllers\Crud\CaracteristicaController::class, 'index'])->name('Categoria');
    Route::get('create',                            [App\Http\Controllers\Crud\CaracteristicaController::class, 'create'])->name('Categoria.create');
    Route::post('post',                             [App\Http\Controllers\Crud\CaracteristicaController::class, 'post'])->name('Categoria.post');
    Route::get('edit/{COD_CATEGORIA}',              [App\Http\Controllers\Crud\CaracteristicaController::class, 'edit'])->name('Categoria.edit');
    Route::post('update',                           [App\Http\Controllers\Crud\CaracteristicaController::class, 'update'])->name('Categoria.update');
    Route::get('delete/{COD_CATEGORIA}',            [App\Http\Controllers\Crud\CaracteristicaController::class, 'delete'])->name('Categoria.delete');
    Route::post('delete',                           [App\Http\Controllers\Crud\CaracteristicaController::class, 'erase'])->name('Categoria.deletePost');
});


    //////////////////////////// ROTAS CARACTERISTICA/////////////////////////////////////////////////////////
Route::middleware(['auth', 'check.funcionario'])->prefix('caracteristica')->group(function() {
    Route::get('/',                                 [App\Http\Controllers\Crud\CaracteristicaController::class, 'index'])->name('Caracteristica');
    Route::get('create',                            [App\Http\Controllers\Crud\CaracteristicaController::class, 'create'])->name('Caracteristica.create');
    Route::post('post',                             [App\Http\Controllers\Crud\CaracteristicaController::class, 'post'])->name('Caracteristica.post');
    Route::get('edit/{COD_CARACTERISTICA}',         [App\Http\Controllers\Crud\CaracteristicaController::class, 'edit'])->name('Caracteristica.edit');
    Route::post('update',                           [App\Http\Controllers\Crud\CaracteristicaController::class, 'update'])->name('Caracteristica.update');
    Route::get('delete/{COD_CARACTERISTICA}',       [App\Http\Controllers\Crud\CaracteristicaController::class, 'delete'])->name('Caracteristica.delete');
    Route::post('delete',                           [App\Http\Controllers\Crud\CaracteristicaController::class, 'erase'])->name('Caracteristica.deletePost');
});