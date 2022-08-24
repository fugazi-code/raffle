<?php

namespace App\Http\Livewire;

use App\Models\Contestant;
use App\Models\Prize;
use Livewire\Component;

class Contestants extends Component
{
    public array $detail = [];

    public array $contestant;

    public int $openSlots;

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
        $this->openSlots = Contestant::query()
                                     ->where('prize_id', $this->prizeID)
                                     ->whereNull('code_name')
                                     ->count();

        return view('livewire.contestants', ['prize' => $this->prize]);
    }

    public function store()
    {
        $this->detail['prize_id'] = $this->prize->id;
        $this->detail['slot_no']  = 1 + Contestant::query()->where('prize_id', $this->prizeID)->max('slot_no');
        Contestant::create($this->detail);
    }

    public function updated()
    {
        foreach ($this->contestant as $value) {
            Contestant::query()->where('id', $value['id'])->update($value);
        }
    }

    public function remove($id)
    {
        Contestant::destroy($id);
    }
}
