<?php

use Illuminate\Support\Facades\Route;

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

// ------- ->name() Nomeia as rotas, as mesmos podem ser referenciados com a fn route('apelido')

// OBS: Da para mexer na configuração do laravel e não irá precisar colocar o caminho relativo da classe
// ------- 1 Forma de como chamar controller/método
// use App\Http\Controllers\PrincipalController;
// Route::get('/', [PrincipalController::class, 'principal']);

// ------- 2 Forma de como chamar controller/método
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');



// ------- prefix()->grup() Cria um grupo de rotas que irão ser depentes do prefixo criado
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');
});



// ------- {} Recebe parâmetros via URL
// ------- {name?} ? Define o campo como 
// ------- $nome = default -> Define um valor default se caso não receber nada
// ------- ->where() Faz validação dos parâmetros com expressão regular
// Route::get('/contato/{nome}/{idade}/{opcional?}', function (string $nome, int $idade, $default = "Default") {
//     return "Olá $nome, você tem $idade anos?";
// })->where('nome', '[A-Za-z]+')->where('idade', '[0-9]+');

// ------- Forma de enviar os parâmetros para as controllers
Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');



// ------- Rota de contingência, ao acessar uma rota que não existe irá cair aqui.
Route::fallback(function() {
    echo 'A rota acessa não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial.';
});



// ------- Redirecionamento entre rotas, no exemplo vamos acessar a /rota2 e seremos redirecionados para a /rota1
// Route::get('/rota1', function () {
//     return 'Rota 1';
// })->name('site.rota1');

// ------- EXEMPLO 1
// Route::get('/rota2', function () {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// ------- EXEMPLO 2
// Ao acessar a rota /rota2, seremos redirecionados para a rota1
// Route::redirect('/rota2', '/rota1');