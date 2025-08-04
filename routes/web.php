<?php



use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\presentacioneController;
use App\Http\Controllers\marcaController;

Route::get('/', function () {
    return view('template');
});

Route::view('/panel', 'panel.index')->name('panel');

Route::resources([
    'categorias' => categoriaController::class,
    'presentaciones' => presentacioneController::class,
    'marcas' => marcaController::class,
    'productos' => ProductoController::class
]);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/401', function () {
    return view('pages.401');
});

Route::get('/404', function () {
    return view('pages.404');
});

Route::get('/500', function () {
    return view('pages.500');
});

Route::get('/blank', function () {
    return view('pages.blank');
});