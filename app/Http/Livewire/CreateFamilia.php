<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Familia;
use App\Models\Ordene;

class CreateFamilia extends Component
{
    public $familias, $nombre, $familia, $ordenes, $orden;
    public $modelFamilia, $confirming;

    protected $rules = [
        'modelFamilia.nombre' => 'required|min:5',
        'modelFamilia.orden_id' => 'required',
    ];

    public function mount()
    {
        $this->familias = Familia::all();
        $this->familia = new Familia;

        $this->ordenes = [];
        $this->modelFamilia = new Familia;
    }

    public function render()
    {
        return view('livewire.create-familia');
    }

    public function createModal()
    {
        $this->nombre = null;
        $this->ordenes = Ordene::get();
        $this->dispatchBrowserEvent('openModal');
    }

    public function create()
    {
        $this->validate();
        Familia::create([
            'nombre' => $this->modelFamilia->nombre,
            'orden_id' => $this->modelFamilia->orden_id,
        ]);
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('closeModal');
        $this->mount();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function delete($id)
    {
        $this->familia->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function modalUpdate($id)
    {
        $this->ordenes = Ordene::get();
        $this->modelFamilia = $this->modelFamilia->find($id);
        $this->dispatchBrowserEvent('editModal');
    }

    public function update()
    {
        $this->modelFamilia->save();
        $this->modelFamilia->nombre = null;
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('ECModal');
        $this->mount();
    }
}
