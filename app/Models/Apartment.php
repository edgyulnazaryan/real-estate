<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    public $fillable = [
        'type',
        'buy_type',
        'wall',
        'status',
        'address',
        'price',
        'room',
        'area',
        'floor',
        'image'
    ];

}
