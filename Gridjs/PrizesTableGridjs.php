<?php

namespace Gridjs;

use App\Models\Prize;
use Illuminate\Database\Eloquent\Builder;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class PrizesTableGridjs extends LaravelGridjs
{
    public function config()
    {
        return $this->setQuery(model: Prize::query())
                    ->editColumn('action', function ($row) {
                        return '<a href="'.route('image.show', ['id' => $row['id']]).'" class="btn btn-sm btn-warning">Add Pics</a>
                                <a href="'.route('prize.edit', ['prize' => $row['id']]).'" class="btn btn-sm btn-info">Edit</a>';
                    });
    }

    public function columns(): array
    {
        return [
            'name' => 'Name',
            'slot' => 'Slot',
            'is_published' => 'Published',
            'action' => [
                'name' => '...',
                'sort' => ['enabled' => false],
                'formatter' => true
            ],
        ];
    }
}

