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
}
