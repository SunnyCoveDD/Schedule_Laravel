<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function addSubject()
    {
        return view('subjects.create_subjects');
    }

    public function addSubjectsPost(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects',
        ]);
        Subjects::create($request->all());
        return redirect()->route('admin');
    }
}
