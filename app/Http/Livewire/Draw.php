<?php

namespace App\Http\Livewire;

use App\Models\Contestant;
use App\Models\Drawed;
use Livewire\Component;

class Draw extends Component
{
    public $prize;

    public $contestant;

    public $drawed;

    protected $queryString = ['prize'];

    public function render()
    {
        $this->drawed = Drawed::query()
                              ->with('contestant')
                              ->where('draweds.prize_id', $this->prize)
                              ->orderBy('created_at')
                              ->get()
                              ->toArray();
        $this->contestant = Contestant::query()
                                      ->where('prize_id', $this->prize)
                                      ->whereNotIn('id', collect($this->drawed)->pluck('contestant_id'))
                                      ->get();
        dd($this->drawed);
        return view('livewire.draw');
    }

    public function setDrawed($id)
    {
        Drawed::create([
            'prize_id' => $this->prize,
            'contestant_id' => $id,
        ]);
    }
}
