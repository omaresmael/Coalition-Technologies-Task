<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::withCount('tasks')->get();

        return view('project.index',compact('projects'));
    }

    public function store(ProjectRequest $request)
    {

       Project::create($request->validated());
       return response()->json('success');
    }

    public function showTasks(Project $project)
    {
        $tasks = $project->tasks()->orderBy('priority')->get();
        return view('project.tasks',compact('tasks','project'));
    }

}
