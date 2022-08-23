<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Gridjs\PrizesTableGridjs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home', ['prizeTable' => app(PrizesTableGridjs::class)->make(route('prize.fetch'))]);
    }

    public function fetchPrize()
    {
        return app(PrizesTableGridjs::class)->fetch(request());
    }

    public function create()
    {
        return view('prize_form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'bet' => 'required|numeric',
            'is_published' => 'required',
            'description' => 'required',
            'code' => 'required|unique:prizes',
        ]);

        Prize::create($validated);

        return redirect()->route('home');
    }

    public function edit(Prize $prize)
    {
        return view('prize_form', compact('prize'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'bet' => 'required|numeric',
            'is_published' => 'required',
            'description' => 'required',
        ]);

        $prize = Prize::find($id);
        $prize->name = $validated['name'];
        $prize->bet = $validated['bet'];
        $prize->is_published = $validated['is_published'];
        $prize->description = $validated['description'];
        $prize->save();

        return redirect()->route('home');
    }
}
