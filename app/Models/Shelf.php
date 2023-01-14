<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'copyright',
        'logo',
        'is_private',
        'is_hidden',
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'is_hidden' => 'boolean',
    ];
}
