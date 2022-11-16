<?php

namespace App\Http\Livewire;

use App\Models\AvesNueva;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirImg extends Component
{

    use WithFileUploads;
 
    public $img,$info,$validation;

    public function render()
    {
        return view('livewire.subir-img');
    }

    public function mount(){
        $this->validation = false;
    }

    public function save()
    {
        $this->validate([
            'img' => 'image|required', 
            'info' => 'required|max:1000', 
        ]);
 


        $url = $this->img->store('public/imgs');

        $url = substr($url, 7);

        AvesNueva::insert([
            'foto' => $url,
            'info' => $this->info,
        ]);

        $this->validation = true;
        return true;
    }
}
