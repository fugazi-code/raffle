<?php

namespace App\Http\Controllers;

use App\Models\Prize;

class HomepageController extends Controller
{
    public function index()
    {
        $prize = Prize::query()->with('image')->paginate(10);

        return view('welcome', compact('prize'));
    }
}
