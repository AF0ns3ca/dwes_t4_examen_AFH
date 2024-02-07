<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'deadline' => 'required|date',
            ]);

            $projects = Project::create($request->all());
            return response()->json($projects, 201);
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $projects = Project::find($id);

        if(!$projects){
            return response()->json(['message' => 'El projects no está'], 404);
        }
        else{
            return response()->json($projects, 200);
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
                'name' => 'required|string',
                'description' => 'required|string',
                'deadline' => 'required|date',
            ]);
            $projects = Project::find($id);
            $projects->name = $request->input('name');
            $projects->description = $request->input('description');
            $projects->deadline = $request->input('deadline');
            $projects->save();

            return response()->json($projects, 200);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $projects = Project::find($id);

        if(!$projects){
            return response()->json(['message' => 'No se encuentra el elemento'], 404);
        }
        else{
            $projects->delete();
            return response()->json(['message' => 'Elemento Eliminado'], 200);
        }  
    }
}
