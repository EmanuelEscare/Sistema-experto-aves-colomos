<?php

namespace App\Http\Livewire;

use App\Models\Atributo;
use App\Models\Ave;
use App\Models\Habita;
use Livewire\Component;

class RulesExplanation extends Component
{
    public $paso, $flag,$flag2;
    public $size, $rangeSize = [], $habitaSelect, $attributeSelect, $nombreBuscar, $sizeName, $habitaName;

    public $habitats, $attributes;
    public $pasoTwo, $pasoTree;
    public $popup, $visible;

    public $nuevaAve;


    public function mount(){
        $this->paso = [];
        $this->paso[0] = true;
        $this->paso[1] = false;
        $this->paso[2] = false;
        $this->paso[3] = false;

        $this->flag = [];
        $this->flag[0] = false;
        $this->flag[1] = false;
        $this->flag[2] = false;
        $this->nuevaAve = false;
    }

    public function render()
    {
        return view('livewire.rules-explanation');
    }

    public function ruleOne($request){
        $this->size = $request;
        $this->flag[0] = true;
        
        $this->ruleTwo();
    }

    public function ruleTwo(){
        if ($this->size == 1) {
            $this->rangeSize[0] = 0;
            $this->rangeSize[1] = 22;  
            $this->sizeName = 'Pequeña';         
        }
        if ($this->size == 2) {
            $this->rangeSize[0] = 23;
            $this->rangeSize[1] = 35;
            $this->sizeName = 'Mediana';         
        }
        if ($this->size == 3) {
            $this->rangeSize[0] = 36;
            $this->rangeSize[1] = 100;
            $this->sizeName = 'Grande';         
        }

        $this->pasoTwo = Ave::whereBetween('mide', [$this->rangeSize[0], $this->rangeSize[1]])->with('habitats.habitat')->get();
        
        $this->habitats = collect([]);

        foreach($this->pasoTwo as $ave){
            foreach($ave->habitats as $habitat){
                $this->habitats = $this->habitats->concat(collect([$habitat->habitat->toArray()]));
            }
        }
        //dd($this->habitats->unique('id'));
        $this->habitats = $this->habitats->unique('id')->shuffle();

        $this->paso[1] = true;
    }

    public function ruleTwoSave($request){
        $this->habitaSelect = $request;
        $this->flag[1] = true;
        
        $this->ruleTree();
    }

    public function ruleTree(){
        $this->pasoTree = Ave::whereBetween('mide', [$this->rangeSize[0], $this->rangeSize[1]])->whereHas
        ('habitats.habitat', function ($query) {
            return $query->where('id', $this->habitaSelect);
        })->with('atributos')->get();
        
        
        $this->attributes = collect([]);

        foreach($this->pasoTree as $ave){
            foreach($ave->atributos as $atributo){
                $this->attributes = $this->attributes->concat(collect([$atributo->toArray()]));
            }
        }
        $this->attributes = $this->attributes->unique('nombre')->shuffle();
        
        //dd($this->attributes);
        $this->paso[2] = true;
    }

    public function result($request){
        $this->attributeSelect = $request;
        $this->nombreBuscar = Atributo::find($request)->nombre;
        $this->flag[2] = true;
        $this->habitaName = Habita::find($this->habitaSelect)->nombre;

        $this->ave = Ave::whereBetween('mide', [$this->rangeSize[0], $this->rangeSize[1]])->whereHas('habitats', function ($query) {
            return $query->where('habitat_id', $this->habitaSelect);
        })->whereHas('atributos', function ($query) {
            return $query->where('nombre', $this->nombreBuscar);
        })->inRandomOrder()->first();

        //dd($this->ave);
        $this->paso[3] = true;
    }

    public function nuevaAve(){
        $this->nuevaAve = true;
    }
    
}
