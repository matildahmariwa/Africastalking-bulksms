<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Contact;
use Db;

class contact_groupController extends Controller
{
    public function index()
    {
        return view('layouts.add'); 
    }

    public function store(Request $request)
    {
        $contact_id= Contact::findOrFail($request->input('contact'));
        $group_id= Group::findOrFail($request->input('group'));
        $contact_id->groups()->attach($group_id);
        // dd($request->all());
        

    }
}
