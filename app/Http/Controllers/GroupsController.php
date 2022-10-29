<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function addGroup()
    {
        return view('groups.create_groups');
    }

    public function addGroupPost(Request $request)
    {
        $request->validate([
           'name'=>'required|unique:groups',
        ]);
        Groups::create($request->all());
        return redirect()->route('admin');
    }
}
