<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContestantController extends Controller
{
    public function show($id)
    {
        return view('contestants');
    }
}
