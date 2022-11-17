<?php

namespace App\Http\Livewire;

use App\Models\Atributo;
use App\Models\Ave;
use App\Models\Familia;
use App\Models\Habita;
use App\Models\Habitat_ave;
use App\Models\Habitatave;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAve extends Component
{
    use WithFileUploads;

    public $aves, $nombre, $ave, $familias, $familia, $habitas, $mide, $img; 

    protected $rules = [
        'nombre' => 'required|min:5',
        'familia' => 'required',
        'img' => 'required|image',
        'mide' => 'required'
    ];

    public function mount(){
        $this->aves = Ave::all();
        $this->ave = new Ave;

        $this->Atributtes = [];
        $this->habitas = [];
        $this->familias = [];
    }

    public function render()
    {
        return view('livewire.create-ave');
    }

    public function createModal(){
        $this->nombre = null;
        $this->familias = Familia::get();
        $this->dispatchBrowserEvent('openModal');
    }

    public function create(){
        $this->validate();
        
        $url = $this->img->store('public/aves');
        $url = substr($url, 7);

        Ave::create([
            'nombre' => $this->nombre,
            'mide' => $this->mide,
            'img' =>  $url,
            'familia_id' => $this->familia,
        ]);
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('closeModal');
        $this->mount();
    }

    public function delete($id){
        $this->ave->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function update($id){

    }

    // MODULE ATTRIBUTES
    public $aveId, $modeloA, $Atributtes;

    public function openAttributes($id){
        $this->aveId = $id;
        $this->modeloA = Ave::find($id);

        $this->Atributtes = 1;
        $this->dispatchBrowserEvent('openModal1');
    }




    // MODULE HABITAS

    public function openHabitas($id){
        $this->aveId = $id;
        $this->modeloA = Ave::find($id);

        $this->habitas = 1;
        $this->dispatchBrowserEvent('openModal2');
    }

}
