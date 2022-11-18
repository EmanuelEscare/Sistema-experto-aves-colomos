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
    public $confirming;
    
    public $modelAve; 

    protected $rules = [
        'modelAve.nombre' => 'required|min:5',
        'modelAve.familia_id' => 'required',
        'img' => 'required|image',
        'modelAve.mide' => 'required'
    ];

    public function mount(){
        $this->aves = Ave::all();
        $this->ave = new Ave;
        $this->modelAve = new Ave;

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
            'nombre' => $this->modelAve->nombre,
            'mide' => $this->modelAve->mide,
            'img' =>  $url,
            'familia_id' => $this->modelAve->familia_id,
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

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function update(){
        $this->validate();

        $url = $this->img->store('public/aves');
        $url = substr($url, 7);

        $this->modelAve->img = $url;
        $this->modelAve->save();
        $this->modelAve = new Ave;
        $this->dispatchBrowserEvent('notification');
        $this->dispatchBrowserEvent('ECModal');
        $this->mount();
    }

    public function modalUpdate($id){
        $this->modelAve = $this->modelAve->find($id);
        $this->familias = Familia::get();
        $this->dispatchBrowserEvent('editModal');
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
