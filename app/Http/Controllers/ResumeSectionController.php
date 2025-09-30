<?php

namespace App\Http\Controllers;

use App\Models\ContactSection;
use App\Models\ResumeSection;
use Illuminate\Http\Request;

class ResumeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_section = ContactSection::first();
        return view('admin.resume_section.index', compact('contact_section'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ResumeSection $resumeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResumeSection $resumeSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResumeSection $resumeSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumeSection $resumeSection)
    {
        //
    }
}
