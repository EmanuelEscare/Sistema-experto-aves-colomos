<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ordene;

class CreateOrden extends Component
{
    public $ordenes, $nombre, $orden;
    public $confirming;
    
    public $editId, $modelOrden; 

    protected $rules = [
        'modelOrden.nombre' => 'required|min:5',
    ];

    public function mount(){
        $this->ordenes = Ordene::all();
        $this->orden = new Ordene;
        $this->editId = null;

        $this->modelOrden = new Ordene;
    }

    public function render()
    {
        return view('livewire.create-orden');
    }

    public function createModal(){
        $this->modelOrden->nombre = null;
        $this->dispatchBrowserEvent('openModal');
    }

    public function create(){
        $this->validate();
        
        Ordene::create([
            'nombre' => $this->modelOrden->nombre,
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

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function update(){
        $this->modelOrden->save();
        $this->modelOrden->nombre = null;
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('ECModal');
        $this->mount();
    }

    public function modalUpdate($id){
        $this->modelOrden = $this->modelOrden->find($id);
        $this->dispatchBrowserEvent('editModal');
    }

}
