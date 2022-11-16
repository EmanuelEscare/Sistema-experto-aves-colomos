<?php

namespace App\Http\Livewire;

use App\Models\Habita;
use App\Models\Habitat_ave;
use App\Models\Habitatave;
use Livewire\Component;

class FormHab extends Component
{

    public $idAve, $habita_id;


    protected $rules = [
        'habita_id' => 'required',
    ];

    public function mount(){
        $this->Habitats = Habita::get();
        $this->HabitatsAve = Habitat_ave::where('ave_id', $this->idAve)->get();
    }

    public function render()
    {
        return view('livewire.form-hab');
    }

    public function createHabitas(){
        $this->validate();
        
        Habitat_ave::create([
            'ave_id' => $this->idAve,
            'habitat_id' => $this->habita_id,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('notification');
    }

    public function deleteHabitas($id){
        Habitat_ave::find($id)->delete();
        $this->mount();
        $this->dispatchBrowserEvent('notification');
    }
}
