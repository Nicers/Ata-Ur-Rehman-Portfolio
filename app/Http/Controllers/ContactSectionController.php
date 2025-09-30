<?php

namespace App\Http\Controllers;

use App\Models\ContactSection;
use Illuminate\Http\Request;
use Validator;

class ContactSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_section = ContactSection::first();
        return view('admin.contact_section.index', compact('contact_section'));
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
            'location_txt' => 'required',
            'location_url' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'button_txt' => 'required',
        ]);
        if($validate->fails()){
            toastAlert('error', $validate->errors()->first());
            return back();
        }

        $contact = ContactSection::first();
        if(!isset($contact)){
            $contact = new ContactSection();
        }
        $contact->title = $request->title;
        $contact->description = $request->desc;
        $contact->location_txt = $request->location_txt;
        $contact->location_url = $request->location_url;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->button_txt = $request->button_txt;
        $contact->save();

        toastAlert('success', 'Changes saved successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSection $contactSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactSection $contactSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactSection $contactSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSection $contactSection)
    {
        //
    }
}
