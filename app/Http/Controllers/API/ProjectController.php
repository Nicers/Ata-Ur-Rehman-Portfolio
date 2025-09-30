<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ContactSection;
use App\Models\Hero;
use App\Models\Project;
use App\Models\project_section;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category_name)
    {
        $category = ProjectCategory::where('name', $category_name)->first();
        
        $projects = Project::where('category_id', $category->id)->get();
        $projects->transform(function($project) {
            $project['src'] = 'storage/'. $project->image;
            $project['isGit'] = $project->isGit == 1 ? true : false;
            return $project;
        });
        return response()->json(['projects'=>$projects], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getHome()
    {
        $hero = Hero::first();
        $hero['buttons'] = $hero->buttons;
        
        $about = About::first();
        $about->image = 'storage/'. $about->image;

        $project_section = project_section::with('title_descs')->first();

        $contact_section = ContactSection::first();

        return response()->json([
            'sections' => [
                [
                    'type' => 'hero',
                    'data' => $hero
                ],
                [
                    'type' => 'about',
                    'data' => $about
                ],
                [
                    'type' => 'project_section',
                    'data' => $project_section
                ], 
                [
                    'type' => 'contact_section',
                    'data' => $contact_section
                ]
            ]
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
