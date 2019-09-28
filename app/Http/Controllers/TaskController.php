<?php

namespace App\Http\Controllers;

use App\Mail\MailUser;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('/FrontEnd.Task.show', compact('projects'));
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request['Title'],
            'project_id' => $request['project_id'],
        ]);
        session()->flash('success', 'Task Add Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::deleted($id);
    }

    public function tasksshoww(Task $task)
    {
        $tasks = Task::where('project_id', $task->id)->get();
        return view('/Frontend.SetProTask.view', compact('tasks'));
    }

    public function addtask(Request $request)
    {
        Task::create([
            'project_id' => $request['project_id'],
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
        ]);
        $name = auth()->user()->name;
        Mail::to('test@gmail.com')->send(new MailUser($name));
        session()->flash('success', 'Task Add Success');
        return redirect()->back();
    }

    public function showtask()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('/FrontEnd.Task.view', compact('tasks'));
    }

    public function delete(Task $task)
    {
        $task->update([
            'expectation' => 1,
        ]);
        session()->flash('delete', 'delete');
        return redirect()->back();
    }

    public function deleteadmin(Task $task)
    {
        $task->delete();
        session()->flash('delete', 'delete');
        return redirect()->back();

    }

    public function editt(Task $task)
    {
        $projects = Project::get();
        return view('/FrontEnd.Task.edit', compact('task', 'projects'));
    }

    public function edittask(Task $task, Request $request)
    {
        $task->update([
            'project_id' => $request['project_id'],
            'title' => $request['title'],
            'description' => $request['description'],
        ]);
        return redirect()->back();
    }

    public function asine()
    {
        $users = User::where('isAdmin', 1)->get();
        $tasks = Task::get();
        return view('/FrontEnd.Task.asine', compact('users', 'tasks'));

    }

    public function requestask()
    {
        $tasks = Task::where('expectation', 1)->get();
        return view('/FrontEnd.RequestDelete.show', compact('tasks'));
    }
}
