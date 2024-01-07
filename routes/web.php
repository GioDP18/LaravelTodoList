<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/add', function(){
    return view('components/create');
});
Route::get('/update/{id}', [TodosController::class, 'updateTodo'])->name('update');
Route::put('/submit/{id}', [TodosController::class, 'submitupdateTodo'])->name('submitupdate');
Route::get('/', [TodosController::class, 'readTodos'])->name('home');

Route::get('/delete/{id}', [TodosController::class, 'deleteTodos']);

Route::get('/', [TodosController::class, 'readTodos']);
