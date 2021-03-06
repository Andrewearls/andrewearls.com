<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Partners;
use App\Categories;
use App\Http\Requests\ProjectValidator;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project');
    }

    public function create()
    {
        $project = Projects::create();
        return redirect()->route('edit_project', ['id' => $project->id]);
    }

    public function edit($id)
    {
        $project = Projects::find($id);
        $partners = Partners::all();
        $categories = Categories::all();

        return view('cms')->with(['project' => $project,'partners' => $partners, 'categories' => $categories]);
    }

    public function update(ProjectValidator $request, $id)
    {        
        $validated = $request->validated();

        Projects::where('id', $id)
                ->update($validated);
        return 'success';
    }

    public function delete($value='')
    {
        # code...
    }
}
