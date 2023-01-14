<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Shelf;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $query;
    public $perPage = 18;

    public function render()
    {
        return view('livewire.item.index', [
            'latestAdditions' => Item::orderBy('created_at', 'DESC')->take(4)->get(),
            'items' => Item::search($this->query)->paginate($this->perPage),
            'shelves' => Shelf::orderBy('name', 'DESC')->get(),
        ]);
    }
}
