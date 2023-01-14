<?php

namespace App\Http\Livewire\Shelf;

use App\Models\Shelf;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $shelf, $name, $description, $logo, $copyright, $is_private, $is_hidden;

    public function mount(Shelf $shelf)
    {
        if (!Gate::allows('shelf.edit')) {
            abort(503, "You do not have access to this section. This incident will be recorded");
        }

        $this->shelf = $shelf;
        $this->name = $this->shelf->name;
        $this->description = $this->shelf->description;
        $this->copyright = $this->shelf->copyright;
        $this->is_private = $this->shelf->is_private;
        $this->is_hidden = $this->shelf->is_hidden;
    }

    public function render()
    {
        return view('livewire.shelf.edit');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);
        if ($this->logo) {
            $this->validate(['logo' => 'required|file|mimes:webp,png,jepg,jpg']);
            Storage::delete($this->shelf->logo);
        }

        try {
            $this->shelf->update([
                'name' => $this->name,
                'logo' => ($this->logo) ? $this->logo->store('images') : $this->shelf->logo,
                'description' => $this->description,
                'copyright' => $this->copyright,
                'is_private' => ($this->is_private) ? true : false,
                'is_hidden' => ($this->is_hidden) ? true : false,
            ]);
            session()->flash('flash.banner', 'Changes successfully saved!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.shelf.edit', ['shelf' => $this->shelf->id]);
    }
}
