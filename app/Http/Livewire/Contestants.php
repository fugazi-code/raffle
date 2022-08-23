<?php

namespace App\Http\Livewire;

use App\Models\Contestant;
use App\Models\Prize;
use Livewire\Component;

class Contestants extends Component
{
    public array $detail = [];

    public array $contestant;

    public $prize;

    public $prizeID;

    protected $queryString = ['prizeID'];

    public function mount()
    {
        $this->prize = Prize::find($this->prizeID);
    }

    public function render()
    {
        $this->contestant = Contestant::query()->where('prize_id', $this->prizeID)->get()->toArray();

        return view('livewire.contestants', ['prize' => $this->prize]);
    }

    public function store()
    {
        $this->detail['prize_id'] = $this->prize->id;
        Contestant::create($this->detail);
    }
}
