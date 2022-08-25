<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drawed extends Model
{
    protected $fillable = [
        'prize_id',
        'contestant_id'
    ];

    public function contestant()
    {
        return $this->hasOne(Contestant::class, 'id', 'contestant_id');
    }
}
