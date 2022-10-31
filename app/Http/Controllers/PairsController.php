<?php

namespace App\Http\Controllers;

use App\Models\Cabinets;
use App\Models\Days;
use App\Models\Groups;
use App\Models\Pairs;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;

class PairsController extends Controller
{
    public function mainView()
    {
        $pairs = Pairs::all();
        $groups = Groups::all();
        return view('main.main', compact('pairs', 'groups'));
    }
    public function addPairs()
    {
        $groups = Groups::all();
        $subjects = Subjects::all();
        $users = User::where('role_id', 3)->get();
        $cabinets = Cabinets::all();
        return view('pairs.create_pairs', compact('groups', 'subjects', 'users', 'cabinets'));
    }

    public function addPairsPost(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'group_id' => 'required',
            'subject_id' => 'required',
            'user_id' => 'required',
            'cabinet_id' => 'required',
            'date_id' => 'required',
        ]);
        Pairs::create($request->all());
        return redirect()->route('admin');
    }
}
