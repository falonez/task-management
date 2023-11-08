<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::all();
        $user = User::all();
        return view('Addtask', compact( 'user'));
    }

    public function create(Request $request)
    {
        // @dd($request->title);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->urgency = $request->urgency;
        $task->duration = $request->duration;
        $task->deadline = $request->deadline;
        $task->user_assign_task = $request->user_assign_task;
        $task->user_create_task = $request->user_create_task;
        $task->status = "open" ;
        $task->save();

        return redirect()->action([HomeController::class, 'index']);
    }

    public function update($id)
    {
        $taskDetail = Task::find($id);
        return view('updateTask', compact('taskDetail'));
    }

    public function updateTask(Request $request)
    {
        $all = $request->all();
        // $taskDetail = Task::find($id);
        Task::where('id', $all['id_user'])->update(["status" =>$all['status'], "skor"=>$all['skor']]);

        return redirect()->action([HomeController::class, 'index']);

    }

    public function updateMyTask( $id, $task)
    {
        if($task == "open"){
            $task = "on_progress";
        }elseif($task == "on_progress"){
            $task = "review";
        }
        Task::where('id', $id)->update(["status" =>$task]);
        // redirect to another function in controller
        return redirect()->action([HomeController::class, 'index']);
    }
}
