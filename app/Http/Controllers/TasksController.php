<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Auth;


class TasksController extends Controller
{
    public function index()
    {
        if(isset(Auth::user()->id))
        {
            $tasks = Auth::user()->tasks()->orderBy('created_at', 'DESC')->get();

            return view('home', ["tasks" => $tasks]);
        }
        else
        {
            return redirect('login');
        }
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Task::create([
            "description" => $request->description,
            "user_id" => Auth::user()->id
        ]);

        return redirect('home')->with('status', 'Tasku u shtua me sukses!');
    }

    public function edit(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', ["task" => $task]);
//        $task = Task::where('id', '>' ,$id)->first();
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->update($request->only('description'));

        if($task==1)
    {
        return redirect('tasks/'. $id . '/edit')->with('status', 'Ndryshimi eshte kryer me sukses!');
    }
    else
    {
        return redirect('tasks/'. $id . '/edit')->with('error', 'Ka ndodhur nje gabim');
    }
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->delete();

        if($task==1)
        {
            return redirect('home')->with('status', 'Ndryshimi eshte kryer me sukses!');
        }
        else
        {
            return redirect('home')->with('error', 'Ka ndodhur nje gabim');
        }
    }
}
