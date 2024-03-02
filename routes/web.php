<?php
use App\Models\Libro;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listado', [LibroController::class, 'index'])->name('listado.index');
Route::get('/buscar', [LibroController::class, 'buscar'])->name('buscar');

Route::get('/administrar', [LibroController::class, 'show'])->name('administrar');

Route::get('/administrar/editar/{id}', [LibroController::class, 'editar'])->name('editar');
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');

Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');

Route::delete('/administrar/borrar/{id}', [LibroController::class, 'borrar'])->name('borrar');
