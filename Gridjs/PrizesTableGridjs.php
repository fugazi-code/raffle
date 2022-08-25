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
                    ->editColumn('is_published', function ($row) {
                        return $row['is_published'] ? 'Published' : 'Not Published';
                    })
                    ->editColumn('action', function ($row) {
                        return '<a href="'.route('image.show', ['id' => $row['id']]).'" class="btn btn-sm btn-warning"><i class="bx bx-image-add"></i></a>
                                <a href="'.route('contestant.index', ['prizeID' => $row['id']]).'" class="btn btn-sm btn-primary"><i class="bx bx-user-plus"></i></a>
                                <a href="'.route('draw.index', ['prize' => $row['id']]).'" class="btn btn-sm btn-success"><i class="bx bx-star"></i></a>
                                <a href="'.route('prize.edit', ['prize' => $row['id']]).'" class="btn btn-sm btn-info"><i class="bx bxs-edit"></i></a>';
                    });
    }

    public function columns(): array
    {
        return [
            'name' => 'Name',
            'bet' => 'Bet',
            'is_published' => 'Publish Status',
            'action' => [
                'name' => '...',
                'sort' => ['enabled' => false],
                'formatter' => true
            ],
        ];
    }
}

