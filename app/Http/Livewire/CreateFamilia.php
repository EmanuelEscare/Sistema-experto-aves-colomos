<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Familia;
use App\Models\Ordene;

class CreateFamilia extends Component
{
    public $familias, $nombre, $familia, $ordenes, $orden; 

    protected $rules = [
        'nombre' => 'required|min:5',
        'orden' => 'required',
    ];

    public function mount(){
        $this->familias = Familia::all();
        $this->familia = new Familia;

        $this->ordenes = [];
    }

    public function render()
    {
        return view('livewire.create-familia');
    }

    public function createModal(){
        $this->nombre = null;
        $this->ordenes = Ordene::get();
        $this->dispatchBrowserEvent('openModal');
    }

    public function create(){
        $this->validate();
        
        Familia::create([
            'nombre' => $this->nombre,
            'orden_id' => $this->orden,
        ]);
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('closeModal');
        $this->mount();
    }

    public function delete($id){
        $this->familia->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function update($id){

    }
}
