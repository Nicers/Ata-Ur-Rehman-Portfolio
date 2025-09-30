<?php

namespace App\Http\Controllers;

use App\Models\project_section;
use App\Models\Project_titleDes;
use DB;
use Illuminate\Http\Request;
use Validator;

class ProjectSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_section = project_section::with('title_descs')->first();
        return view('admin.project_section.index', compact('project_section'));
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
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'button_txt' => 'required',
            'button_url' => 'required',
        ]);
        if($validate->fails()){
            toastAlert('error', $validate->errors()->first());
            return back();
        }

        $project = project_section::first();
        if(!$project){
            $project = new project_section();
        }
        $project->title = $request->title;
        $project->description = $request->desc;
        $project->button_txt = $request->button_txt;
        $project->button_url = $request->button_url;
        $project->save();

        if(!empty($request->sub_titles)){
            Project_titleDes::truncate();
            foreach ($request->sub_titles as $key => $value) {
         $title_des = new Project_titleDes();
         $title_des->title = $request->sub_titles[$key];   
         $title_des->description = $request->sub_desc[$key];  
         $title_des->project_section_id = $project->id;
         $title_des->save(); 
        }
        }

        toastAlert('success', 'Changes saved successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(project_section $project_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project_section $project_section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project_section $project_section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project_section $project_section)
    {
        //
    }
}
