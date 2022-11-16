<?php

namespace App\Http\Livewire;

use App\Models\Habita;
use Livewire\Component;

class CreateHabita extends Component
{
    public $habitas, $nombre, $habita; 

    protected $rules = [
        'nombre' => 'required|min:5',
    ];

    public function mount(){
        $this->habitas = Habita::all();
        $this->habita = new Habita;
    }

    public function render()
    {
        return view('livewire.create-habita');
    }

    public function createModal(){
        $this->nombre = null;
        $this->dispatchBrowserEvent('openModal');
    }

    public function create(){
        $this->validate();
        
        Habita::create([
            'nombre' => $this->nombre,
        ]);
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('closeModal');
        $this->mount();
    }

    public function delete($id){
        $this->habita->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function update($id){

    }
}
