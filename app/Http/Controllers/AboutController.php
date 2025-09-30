<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about_section.index', compact('about'));
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
            'sub_title' => 'required',
            'desc' => 'required',
            'button_txt' => 'required',
            'button_url' => 'required'
        ]);
        if($validator->fails()){
            toastAlert('error', $validator->errors()->first());
            return back();
        }

        $path = '';
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images/about', 'public');
        }

        $about = About::first();
        if(!$about){
            $about = new About();
            if(!$request->hasFile('image')){
                toastAlert('error', 'Image field is required!');
                return back();
            }
            $about->image = $path;
        }
        else{
            if($request->hasFile('image')){
                if(Storage::disk('public')->exists($about->image)){
                    Storage::disk('public')->delete($about->image);
                }
                $about->image = $path;
            }
        }
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->description = $request->desc;
        $about->button_txt = $request->button_txt;
        $about->button_url = $request->button_url;
        $about->save();

        toastAlert('success', 'Changes saved successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
