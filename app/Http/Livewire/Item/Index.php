<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.item.index', [
            'latestAdditions' => Item::orderBy('created_at', 'DESC')->take(6)->get(),
        ]);
    }
}
