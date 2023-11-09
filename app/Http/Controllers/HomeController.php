<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // mendapatkan user yang login sekarang 
        $user = auth()->user();
        // $task_assign = Task::where('user_assign_task', $user->id)->paginate(2);
        $task_assign = Task::where('user_assign_task', $user->id)->get();
        $task_create = Task::where('user_create_task', $user->id)->get();
        $tasks = Task::all();
        return view('home', compact('tasks', 'task_assign', 'task_create'));
    }
}
