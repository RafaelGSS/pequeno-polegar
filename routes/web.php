<?php

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

//Autenticação
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Pagina home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/config', 'HomeController@config');

//Cadastro de usuário
Route::get('/config/user', 'Auth\RegisterController@showRegistrationForm');
Route::post('/config/user', 'Auth\RegisterController@register');


//CRUD BASICO
Route::resource('/alunos', 'AlunosController');

Route::get('alunos/showP/{id}', 'AlunosController@showPeriod');
Route::get('alunos/show/alunos', 'AlunosController@showAll');
Route::get('alunos/search/form', 'AlunosController@search');
Route::post('alunos/search/list', 'AlunosController@searchParam');

//

// Ajust mensalidade
Route::post('alunos/adjust/now', 'AlunosController@adjustPaid');
Route::get('alunos/paid/student/{id}', 'AlunosController@paid'); // Verificar se PUT é mais seguro
/***************   Funcionários *********************/
Route::resource('/funcionarios', 'FuncionarioController');
