<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function createTodo(Request $request){
        Todos::createTodo();
    }

    public function readTodos(){
        $todos = Todos::all();
        return view('components.read', ['todos' => $todos]);
    }

    public function deleteTodos($id)
    {
        Todos::where('id', $id)->delete();

        return redirect()->back();
    }

}
