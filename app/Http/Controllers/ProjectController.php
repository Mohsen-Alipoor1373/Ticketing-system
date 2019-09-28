<?php

namespace App\Http\Controllers;

use App\AsineTask;
use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProPermision;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('/FrontEnd.Project.index', compact('users'));
    }

    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'title' => $request['Title'],
            'description' => $request['Description'],
            'LanDev' => $request['LanDev'],
        ]);
        $permisions = $request['permision'];
        foreach ($permisions as $permision) {
            ProPermision::create([
                'project_id' => $project->id,
                'permision_id' => $permision,
            ]);
        }
        session()->flash('success', 'Project Add Success');
        return redirect()->back();
    }

    public function showproject()
    {
        $permisions = ProPermision::get();
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('/Frontend.Project.show', compact('projects', 'permisions'));
    }

    public function taskshow()
    {
        $permisions = ProPermision::get();
        $users = AsineTask::where('user_id', auth()->user()->id)->pluck('task_id');
        foreach ($users as $user) {
            $tasks = Task::where('id', $user)->pluck('project_id');
            foreach ($tasks as $task) {
                $projects = Project::where('id', $task)->get();
            }
        }
        return view('/Frontend.SetProTask.show', compact('projects', 'permisions'));
    }
}
