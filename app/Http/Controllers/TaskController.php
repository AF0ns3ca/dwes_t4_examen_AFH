<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'project_id' => 'required|exists:projects,id',
                'title' => 'required|string|max:255',
                'is_completed' => 'sometimes|boolean',
                'deadline' => 'required|date',
            ]);

            $task = Task::create($request->all());
            return response()->json($task, 201);
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    // public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'project_id' => 'exists:projects,id',
                'title' => 'string|max:255',
                'is_completed' => 'sometimes|boolean',
                'deadline' => 'date',
            ]);
            
            // $task = Task::find($id);
            $task->title = $request->title;
            $task->is_completed = $request->is_completed;
            $task->deadline = $request->deadline;
            $task->project_id = $request->project_id;
            $task->save();
            return response()->json($task, 201);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // TODO COMPLETAR 
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'El task no ha sido encontrado'], 404);
        } else {
            $task->delete();
            return response()->json(['message' => 'task eliminado'], 200);
        }
    }
}
