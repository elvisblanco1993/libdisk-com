<?php

namespace App\Http\Livewire\Shelf;

use App\Models\Shelf;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

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

        try {
            Shelf::create([
                'name' => $this->name,
                'logo' => $this->logo->store('images'),
                'description' => $this->description,
                'copyright' => $this->copyright,
                'is_private' => ($this->is_private) ? true : false,
                'is_hidden' => ($this->is_hidden) ? true : false,
            ]);
            session()->flash('flash.banner', 'Shelf successfully created!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.shelf.index');
    }
}
