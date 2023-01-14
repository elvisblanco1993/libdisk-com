<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use Searchable;
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

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
