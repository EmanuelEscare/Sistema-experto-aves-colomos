<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordene;

class CreateOrden extends Component
{
    public $ordenes, $nombre, $orden; 

    protected $rules = [
        'nombre' => 'required|min:5',
    ];

    public function mount(){
        $this->ordenes = Ordene::all();
        $this->orden = new Ordene;
    }

    public function render()
    {
        return view('livewire.create-orden');
    }

    public function createModal(){
        $this->nombre = null;
        $this->dispatchBrowserEvent('openModal');
    }

    public function create(){
        $this->validate();
        
        Ordene::create([
            'nombre' => $this->nombre,
        ]);
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('closeModal');
        $this->mount();
    }

    public function delete($id){
        $this->orden->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function update($id){

    }

}
