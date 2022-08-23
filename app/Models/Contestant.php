<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'prize_id',
        'slot_no',
        'code_name',
        'real_name',
        'phone_no',
        'email',
        'address'
    ];
}
