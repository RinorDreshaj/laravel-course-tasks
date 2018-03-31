<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('home', ["tasks" => $tasks, "user" => "Rinor"]);
    }

    public function store(Request $request)
    {
        Task::create([
            "description" => $request->description,
            "user_id" => 1
        ]);

        return redirect('home');
    }
}
