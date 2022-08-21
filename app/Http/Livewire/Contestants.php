<?php

namespace App\Http\Livewire;

use App\Models\Prize;
use Livewire\Component;

class Contestants extends Component
{
    public ?int $prizeId = null;

    public mixed $prize;

    protected $queryString = ['prizeId'];

    public function mount()
    {
        $this->prize = Prize::query()->find($this->prizeId);
    }

    public function render()
    {
        return view('livewire.contestants', ['prize' => $this->prize]);
    }
}
