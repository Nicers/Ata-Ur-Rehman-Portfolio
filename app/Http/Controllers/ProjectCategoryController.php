<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Validator;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCategory = ProjectCategory::with('projects')->get();
        return view('admin.project_category.index', compact('projectCategory'));
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
            'name' => 'required'
        ]);
        if($validator->fails()){
            toastAlert('error', $validator->errors()->first());
            return back();
        }

        $category = new ProjectCategory();
        $category->name = $request->name;
        $category->save();

        toastAlert('success', 'Project category added successfully!');
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
        $validator = Validator::make($request->all(), 
    [
        'name' => 'required'
    ]);
    if($validator->fails()){
        toastAlert('error', $validator->errors()->first());
        return back();
    }
    
    $category = ProjectCategory::find($id);
    !isset($category) ? toastAlert('success', 'ProjectCategory not found!') : '';
    $category->name = $request->name;
    $category->save();

    toastAlert('success', 'ProjectCategory updated successfully');
    return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProjectCategory::find($id);
        !isset($category) ? toastAlert('success', 'ProjectCategory not found!') : '';
        $category->delete();

        toastAlert('success', 'ProjectCategory deleted successfully');
        return back();
    }
}
