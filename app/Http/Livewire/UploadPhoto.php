<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:2048',
        ]);

        $this->photo->storeAs('public/photos', rand(1000, 99999) . '-' . $this->photo->getClientOriginalName());
    }
}
