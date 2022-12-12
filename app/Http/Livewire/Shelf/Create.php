<?php

namespace App\Http\Livewire\Shelf;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $description, $copyright, $logo, $is_private, $is_hidden;

    public function render()
    {
        return view('livewire.shelf.create');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'logo' => 'required|file|mimes:webp,png,jepg,jpg',
        ]);
    }
}
