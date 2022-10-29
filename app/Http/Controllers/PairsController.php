<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PairsController extends Controller
{
    public function addPairs()
    {
        return view('pairs.create_pairs');
    }

    public function addPairsPost()
    {

    }
}
