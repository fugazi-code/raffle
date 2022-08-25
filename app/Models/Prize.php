<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prize extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'bet',
        'code',
        'is_published',
        'description',
    ];

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, 'prize_id', 'id');
    }

    public function openSlots(): HasMany
    {
        return $this->hasMany(Contestant::class, 'prize_id', 'id')->whereNull('code_name');
    }

    public function closedSlots(): HasMany
    {
        return $this->hasMany(Contestant::class, 'prize_id', 'id')->whereNotNull('code_name');
    }

    public function draws()
    {
        return $this->hasMany(Drawed::class, 'prize_id', 'id');
    }
}
