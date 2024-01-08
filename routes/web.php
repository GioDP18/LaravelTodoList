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
// Show the create form
Route::get('/components/create', [TodosController::class, 'create'])->name('todos.create');

// Process form submission
Route::post('/components/store', [TodosController::class, 'store'])->name('todos.store');

Route::get('/add', function(){
    return view('components/create');
});
Route::get('/update/{id}', [TodosController::class, 'updateTodo'])->name('update');
Route::put('/submit/{id}', [TodosController::class, 'submitupdateTodo'])->name('submitupdate');


Route::get('/delete/{id}', [TodosController::class, 'deleteTodos'])->name('deletetodo');

Route::get('/', [TodosController::class, 'readTodos']);
