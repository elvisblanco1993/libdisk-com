<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'shelf_id',
        'file',
        'title',
        'title_1',
        'title_2',
        'abstract',
        'description',
        'publisher',
        'thumbnail',
        'issued_at',
    ];
}
