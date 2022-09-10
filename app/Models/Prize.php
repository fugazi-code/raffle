<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prize extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->hasMany(Contestant::class, 'prize_id', 'id')->whereNull('code_name')->orWhere('code_name', '');
    }
    
    public function paid(): HasMany
    {
        return $this->hasMany(Contestant::class, 'prize_id', 'id')->where('is_paid', 1);
    }

    public function unpaid(): HasMany
    {
        return $this->hasMany(Contestant::class, 'prize_id', 'id')->where('is_paid', 0);
    }

    public function draws()
    {
        return $this->hasMany(Drawed::class, 'prize_id', 'id');
    }
}
