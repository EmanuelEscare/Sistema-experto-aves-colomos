<?php

namespace App\Http\Livewire;

use App\Models\AvesNueva;
use App\Models\NuevaAve;
use Livewire\Component;

class DesarrolloNuevasAves extends Component
{
    public function render()
    {
        return view('livewire.desarrollo-nuevas-aves');
    }

    public function mount(){
        $this->nuevas_aves = AvesNueva::all();
        $this->nuevas_ave = new AvesNueva;
    }

    public function delete($id){
        $this->nuevas_ave->find($id)->delete();
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }
}
