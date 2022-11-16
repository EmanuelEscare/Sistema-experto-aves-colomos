<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ave;


class NuevaAve extends Component
{

    public  $file, $foto, $fotos, $enum;
    
    public function mount(){
       
        $this->foto = new Ave;

    
    }

    public function submit()
    
    {
    
    $validatedData = $this->validate([
    
    'foto' => 'required',
    
    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    
    ]);
    
    $validatedData['foto'] = $this->file->store('fotos', 'public');
    
    Foto::create($validatedData);
    
    session()->flash('message', 'Imagen subida satisfactoriamente');
    
    
    }

    public function render()
    {
        return view('livewire.nueva-ave');
    }
}
