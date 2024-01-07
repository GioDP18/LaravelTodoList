<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodosController extends Controller
{


    public function create()
    {
        $todos = Todos::all();
        return view('components.create');
    }

    public function store(Request $request)
    {
       $data = $request -> validate([
        'todoName' => 'required',
        'status' => 'nullable|integer',
       ]);


       $newTodos = Todos::create($data);
        return redirect('/');
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
        return redirect('/');
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
