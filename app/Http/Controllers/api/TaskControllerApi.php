<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Exports\TaskExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TaskImport;

class TaskControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = Task::all();        
            return response()->json([
                'status' => 'success',
                'message' => 'data found',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'there is no data',
                'data' => null
            ], 404);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            // check data harus ada 
            $request->validate([
                'image' => 'required',
                'title' => 'required',
                'description' => 'required',
                'urgency' => 'required',
                'duration' => 'required',
                'deadline' => 'required',
                'user_assign_task' => 'required',
                'user_create_task' => 'required',
            ]);

            // Generate image name
            $date = date('ymd');
            $newName = $date.time().'.'.$request->image->extension();

            $request->image->StoreAs('public/images', $request->image->getClientOriginalName());
            $task = new Task();
            $task->image = $newName;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->urgency = $request->urgency;
            $task->duration = $request->duration;
            $task->deadline = $request->deadline;
            $task->user_assign_task = $request->user_assign_task;
            $task->user_create_task = $request->user_create_task;
            $task->status = "open" ;
            $task->save();
            return response()->json([
                'status' => 'success',
                'message' => 'data successfully added',
                'data' => $task
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'there is no data',
                'data' => null
            ], 404);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $data = Task::find($id);
            return response()->json([
                'status' => 'success',
                'message' => 'data found',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'there is no data',
                'data' => null
            ], 404);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            $request->validate([
                'status' => 'required',
                'skor' => 'required',
            ]);

            $data = Task::find($id);
            $data->status=$request->status;
            $data->skor=$request->skor;
            $data->save();
            
            return response()->json([
                "status" => "success",
                "message" => "data successfully updated",
                "data" => $data
            ]);
        } catch(Exception $e){
            return response()->json([
                "status" => "error",
                "message" => "data failed to update",
                "data" => null
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $data = Task::find($id);
            $data->delete();
            return response()->json([
                "status" => "success",
                "message" => "data successfully deleted",
                "data" => $data
            ]);
        }catch(Exception $e){
            return response()->json([
                "status" => "error",
                "message" => "data failed to delete",
                "data" => null
            ]);
        }
    }

    public function userTask(string $id){

        try{
            $user = User::find($id);
            $data = Task::where('user_assign_task', $id)->get();
            $dataNew = [
                "user" => $user,
                "task" => $data
            ];
            return response()->json([
                "status" => "success",
                "message" => "data successfully found",
                "data" => $dataNew
            ]);
        }catch(Exception $e){
            return response()->json([
                "status" => "error",
                "message" => "data failed to found",
                "data" => null
            ]);
        }
    }

    public function exportExel(){
        return Excel::download(new TaskExport, 'task.xlsx');
    }

    public function importExel(Excel $request) 
    {   
        try{
            $import = Excel::import(new TaskImport, request()->file('file'));
            return response()->json([
                "status" => "success",
                "message" => "data successfully imported",
                "data" => $import
            ]);
        }catch(err $e){
            return response()->json([
                "status" => "error",
                "message" => "data failed to import",
                "data" => $e
            ]);
        }
    }
}
