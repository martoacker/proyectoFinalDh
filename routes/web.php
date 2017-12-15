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

// Route::get('/inicio', function () {
//     return view('index');
// });

Route::get('/cursosCategoria={id}', 'MainController@cursosCategoria')->name('cursosCategoria');

// Route::get('/inicio', 'MainController@index')->name('inicio');
Route::get('/faq', 'MainController@faq')->name('faq');
Route::post('/perfil', 'MainController@crearCursos')->name('nuevoCurso');
Route::get('/perfil', 'MainController@mostrarMiPerfil')->name('mostrarPerfil')->middleware("auth");
//Route::get('/perfil/misCategorias', 'MainController@mostrarCategorias')->name('mostrarCategorias');
Route::delete('/perfil/{id}', 'MainController@eliminarCursos')->name('eliminarCurso');
//
Route::get('/perfil/misCursos/editar/{id}', 'MainController@editarCursos')->name('editarCurso')->middleware("auth");
Route::put('/perfil/misCursos/editar/{id}', 'MainController@actualizarCursos')->name('actualizaCurso');

Route::get('/curso/{id}', 'MainController@curso')->name('curso');
Route::post('/curso/{id}', 'MainController@inscripcion')->name('inscripto');
Route::delete('/curso/{id}', 'MainController@desinscripcion')->name('desinscripto');
Route::get('/cursos', 'MainController@todosLosCursos')->name('cursos');
Auth::routes();
// Route::get('/home', 'HomeController@indexDashboard')->name('home');
Route::get('/home', 'MainController@index')->name('inicio');
