<?php

namespace App\Http\Controllers;

use App\Models\Cabinets;
use Illuminate\Http\Request;

class CabinetsController extends Controller
{
    public function addCabinets()
    {
        return view('cabinets.create_cabinets');
    }

    public function addCabinetsPost(Request $request)
    {
        $request->validate([
           'number' => 'required|unique:cabinets',
        ]);
        Cabinets::create($request->all());
        return redirect()->route('admin');
    }
}
