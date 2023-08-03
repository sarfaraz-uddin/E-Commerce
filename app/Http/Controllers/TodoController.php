<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function todo(Request $req){
        $todo=new Todo();
        $todo->create([
            'title'=>$req->input('todo'),
        ]);
        return back()->with('todoadd','Todo added successfully.');
    }
    public function deltodo(Request $req){
        $todo=Todo::find($req->getid);
        $todo->delete();
        return back()->with('tododel','Todo deleted successfully.');
    }
}

