<?php

namespace App\Http\Livewire;

use App\Models\Atributo;
use Livewire\Component;

class FormAtt extends Component
{

    public $nombre, $sexo, $idAve;


    protected $rules = [
        'nombre' => 'required',
        'sexo' => 'required',
    ];

    public function mount(){
        $this->Atributtes = Atributo::where('ave_id', $this->idAve)->get();
    }

    public function render()
    {
        return view('livewire.form-att');
    }

    public function createAttributes(){
        $this->validate();
        
        Atributo::create([
            'nombre' => $this->nombre,
            'mujer' => $this->sexo,
            'ave_id' => $this->idAve,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('notification');
    }

    public function deleteAttributes($id){
        Atributo::find($id)->delete();
        $this->mount();
        $this->dispatchBrowserEvent('notification');
    }
}
