<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function createTodo(Request $request){
        Todos::createTodo();
    }
    public function updateTodo($id){
        $todo = Todos::find($id);
        return view('components/update', compact('todo'));
    }
    public function submitupdateTodo(Request $request, $id){
        $todo=Todos::find($id);
        $todo->todoName=$request->todoName;
        $todo->status=$request->status;
        $todo->save();
        return redirect(route('home'));
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
