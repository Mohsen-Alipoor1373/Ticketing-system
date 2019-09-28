<?php

namespace App\Http\Controllers;

use App\AsineTask;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class ProTask extends Controller
{
    public function index()
    {
        $users = User::get();
        $tasks = Task::get();
        $projects = Project::get();
        return view('/FrontEnd.SetProTask.index', compact('users', 'tasks', 'projects'));
    }

    public function store(Request $request)
    {
        $tasks = $request['task_id'];
        $permisions = $request['permision'];
        foreach ($tasks as $task) {
            foreach ($permisions as $permision) {
                \App\ProTask::create([
                    'user_id' => $request['user_id'],
                    'project_id' => $request['project_id'],
                    'task_id' => $task,
                    'permision' => $permision,
                ]);
            }
        }
        return redirect()->back();
    }

    public function asinetask(Request $request)
    {
        $users = $request['user_id'];
        foreach ($users as $user) {
            AsineTask::create([
                'user_id' => $user,
                'task_id' => $request['task_id'],
            ]);
        }
        session()->flash('success', 'success');
        return redirect()->back();
    }
}
