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

    public $shuffle;

    protected $queryString = ['prize', 'shuffle'];

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
                                      ->when($this->shuffle, function($q) {
                                        $q->inRandomOrder();
                                      })
                                      ->get();
        $this->cleansOrphanedDraws();

        return view('livewire.draw');
    }

    public function shuffleNow()
    {
        $this->shuffle = 1;

        return redirect()->route('draw.index', ['prize' => $this->prize, 'shuffle' => $this->shuffle]);
    }

    public function cleansOrphanedDraws()
    {
        foreach ($this->drawed as $item)
        {
            if(!$item['contestant'])
            {
                Drawed::query()->where('contestant_id', $item['contestant_id'])->delete();
            }
        }
    }

    public function setDrawed($id)
    {
        Drawed::create([
            'prize_id' => $this->prize,
            'contestant_id' => $id,
        ]);
    }

    public function removeDraw($id)
    {
        Drawed::destroy($id);

        return redirect(request()->header('Referer'));
    }
}
