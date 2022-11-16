<div>
    {{-- Stop trying to control. --}}
    <form wire:submit.prevent="createHabitas">
        
        <p>Hábitat</p>
        <select class="form-control form-control-lg" wire:model="habita_id">
            <option value="">...</option>
            @foreach ($this->Habitats as $item)
              <option value="{{$item->id}}">{{$item->nombre}}</option>  
            @endforeach
        </select>
        @error('habita_id')
            <span class="my-3 text-danger">{{ $message }}</span>
        @enderror
        <br>
        <div class="d-grid gap-2 mt-2">
        <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

    <hr>

    @foreach ($this->HabitatsAve as $item)
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            Hábitat: {{ $item->habitat->nombre }} 
            <button class="btn-close" wire:click="deleteHabitas({{ $item->id }})"></button>
        </div>
    @endforeach
</div>