<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Drawed;
use App\Models\Prize;

class HomepageController extends Controller
{
    public function index()
    {
        $prize = Prize::query()
                      ->where('is_published', 1)
                      ->with('image')
                      ->withCount(['openSlots', 'closedSlots', 'draws'])
                      ->paginate(10);

        return view('welcome', compact('prize'));
    }

    public function details($id)
    {
        $prize = Prize::query()->where('code', $id)->with('image')->firstOrFail();

        $contestants = Contestant::query()->where('prize_id', $prize->id)->orderBy('id')->get();

        $drawed = Drawed::query()
                              ->with('contestant')
                              ->where('draweds.prize_id', $prize->id)
                              ->orderBy('created_at')
                              ->get()
                              ->toArray();
        dump($drawed);
        return view('more_details', compact('prize', 'contestants', 'drawed'));
    }
}
