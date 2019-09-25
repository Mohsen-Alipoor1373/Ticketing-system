<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProPermision;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('/FrontEnd.Project.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'title' => $request['Title'],
            'description' => $request['Description'],
            'LanDev' => $request['LanDev'],
            'user_id' => $request['user_id'],
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showproject()
    {
        $permisions = ProPermision::get();
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('/Frontend.Project.show', compact('projects', 'permisions'));
    }


}
