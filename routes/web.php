<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

Route::get('/', function () {
    return view('welcome');
});


// Show the create form
Route::get('/components/create', [TodosController::class, 'create'])->name('todos.create');

// Process form submission
Route::post('/components/store', [TodosController::class, 'store'])->name('todos.store');
