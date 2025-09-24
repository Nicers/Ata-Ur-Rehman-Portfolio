<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('category')->get();
        $categories = ProjectCategory::all();
        return view('admin.project.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'sitePath' => 'required',
            'image' => 'required:image'
        ]);
        if($validator->fails()){
            toastAlert('error', $validator->errors()->first());
            return back();
        }

        $path = $request->file('image')->store('images/project', 'public');
        
        $project = new Project();
        $project->title = $request->title;
        $project->category_id = $request->category_id;
        $project->sitePath = $request->sitePath;
        $project->image = $path;
        $project->gitPath = $request->has('gitPath') ? $request->gitPath : null;
        $project->isGit = $request->has('gitPath') ? true : false;
        $project->save();

        toastAlert('success', 'Project added successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sitePath' => 'required',
        ]);
        if($validator->fails()){
            toastAlert('error', $validator->errors()->first());
            return back();
        }

        $project = Project::find($id);
        $project->title = $request->title;
        if($request->has('image')){
            if(Storage::disk('public')->exists($project->image)){
                Storage::disk('public')->delete($project->image);
            }
            $path = $request->file('image')->store('images/project', 'public');
            $project->image = $path;
        }
        $project->sitePath = $request->sitePath;
        $project->gitPath = $request->gitPath != null ? $request->gitPath : null;
        $project->isGit = $request->gitPath !=null ? true : false;
        $project->save();

        // toastAlert('success', 'Project updated successfully!');
        // return back();
         return response()->json(['success' => true, 'message' => 'Project updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if(!$project){
            toastAlert('error', 'Project not found!');
            return back();
        }

        if(Storage::disk('public')->exists($project->image)){
                Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        toastAlert('success', 'Project deleted successfully!');
        return back();
    }
}
