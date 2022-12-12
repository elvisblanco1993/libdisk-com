<?php

namespace App\Http\Livewire\Shelf;

use App\Models\Shelf;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.shelf.index', [
            'shelfs' => Shelf::get()
        ]);
    }
}
