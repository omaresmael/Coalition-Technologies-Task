<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }


    public function store(TaskRequest $request)
    {
       Task::create($request->validated());
       return response()->json('success');
    }



    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
    }
    public function updatePriorities(Request $request)
    {

       foreach($request->ids as $key => $id)
        {

            Task::find($id)->update(['priority' => $request->priorities[$key]]);
        }
        return response()->json('success');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('success');

    }
}
