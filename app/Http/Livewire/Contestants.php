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

    public $range = ['from' => 0, 'to' => 0];

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
        $this->openSlots  = Contestant::query()
                                      ->where('prize_id', $this->prizeID)
                                      ->where(function ($q) {
                                          $q->whereNull('code_name')
                                            ->orWhere('code_name', '');
                                      })
                                      ->count();

        return view('livewire.contestants', ['prize' => $this->prize]);
    }

    public function store()
    {
        $this->validate([
            'range.from' => 'required|numeric|min:0',
            'range.to' => 'required|numeric|min:'.$this->range['from'],
        ]);

        for ($x = $this->range['from']; $x <= $this->range['to']; $x++) {
            if ($x < 10) {
                $slot = "0-" . $x;
            } else {
                $slot = join('-', str_split($x)) ;
            }

            $this->detail['prize_id'] = $this->prize->id;
            $this->detail['is_paid']  = 0;
            $this->detail['slot_no']  = $slot;

            Contestant::query()->create($this->detail);
        }
    }

    public function updated()
    {
        foreach ($this->contestant as $value) {
            Contestant::query()->where('id', $value['id'])->update($value);
        }
    }

    public function remove($id)
    {
        Contestant::query()->where('prize_id', $id)->delete();
    }
}
