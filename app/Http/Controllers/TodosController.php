<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function createTodo(Request $request){
        Todos::createTodo()
    }
}
