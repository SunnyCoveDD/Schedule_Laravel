<?php

namespace App\Http\Controllers;

use App\Models\Cabinets;
use App\Models\Days;
use App\Models\Groups;
use App\Models\Pairs;
use App\Models\Subjects;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PairsController extends Controller
{

    public function mainView()
    {
        $pairs = Pairs::all();
        $groups = Groups::all();
        $date = new DateTime('now');
        $dateView = $date->format('j F');
        $group_sel = null;
        return view('main.main', compact('pairs', 'groups', 'dateView', 'date', 'group_sel'));
    }
    public function mainViewPost(Request $request)
    {
        $pairs = Pairs::all();
        $groups = Groups::all();
        $date = new DateTime('now');
        $dateView = $date->format('j F');
        $group_sel = $request->group_id;
        return view('main.main', compact('pairs', 'groups', 'dateView', 'date', 'group_sel'));
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
        $request->merge(['date_id']);
        Pairs::create($request->all());
        return redirect()->route('admin');
    }

    public function deletePairs(Pairs $pairs)
    {
        if(Auth::user()->role_id == 1)
        {
            return view('pairs.delete_pairs', compact('pairs'));
        }
    }

    public function deletePairsPost(Pairs $pairs)
    {
        $pairs->delete();
        return redirect()->route('admin');
    }

    public function editPairs(Pairs $pairs)
    {
        $groups = Groups::all();
        $subjects = Subjects::all();
        $users = User::whereBetween('role_id', [3,4])->get();
        $cabinets = Cabinets::all();
        $groupPair = Groups::find($pairs->group_id);
        $subjectPair = Subjects::find($pairs->subject_id);
        $userPair = User::find($pairs->user_id);
        $cabinetPair = Cabinets::find($pairs->cabinet_id);
        if(Auth::user()->role_id == 1){
            return view('pairs.update_pair', compact('pairs','groups', 'subjects', 'users', 'cabinets', 'groupPair', 'subjectPair', 'userPair', 'cabinetPair'));
        }
        return redirect('/');
    }

    public function editPairsPost(Pairs $pairs, Request $request)
    {
        $request->validate([
            'number' => 'required',
            'group_id' => 'required',
            'subject_id' => 'required',
            'user_id' => 'required',
            'cabinet_id' => 'required',
            'date_id' => 'required',
        ]);
        $pairs -> number = $request->input('number');
        $pairs -> group_id = $request->input('group_id');
        $pairs -> subject_id = $request->input('subject_id');
        $pairs -> user_id = $request->input('user_id');
        $pairs -> cabinet_id = $request->input('cabinet_id');
        $pairs -> date_id = $request->input('date_id');
        if(Auth::user()->role_id == 1){
            $pairs->save();
        }
        return redirect()->route('admin');
    }
}
