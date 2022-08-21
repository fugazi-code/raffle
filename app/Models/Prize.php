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
        'slot',
        'code',
        'is_published',
        'description',
    ];

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, 'prize_id', 'id');
    }
}
