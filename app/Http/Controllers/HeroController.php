<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Validator;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero_section.index', compact('hero'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'desc' => 'required',
                'moving_txt1' => 'required',
                'moving_txt2' => 'required',
            ]
        );
        if ($validator->fails()) {
            toastAlert('error', $validator->errors()->first());
        }

        $hero = Hero::first();
        if (!$hero) {
            $hero = new Hero();
        }
        $hero->title = $request->title;
        $hero->description = $request->desc;
        $hero->moving_txt1 = $request->moving_txt1;
        $hero->moving_txt2 = $request->moving_txt2;
        $hero->save();
        $hero->buttons()->delete();
        foreach ($request->labels as $key => $value) {
            $hero->buttons()->create(['label' => $request->labels[$key], 'url' => $request->urls[$key]]);
        }

        toastAlert('success', 'Changes saved successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
