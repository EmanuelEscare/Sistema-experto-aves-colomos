<div>
    {{-- Stop trying to control. --}}
    <form wire:submit.prevent="createAttributes">
        <p class="mt-1">Nombre</p>
        <input class="form-control form-control-lg" type="text" wire:model="nombre">
        @error('nombre')
            <span class="my-3 text-danger">{{ $message }}</span>
        @enderror
        <br>
        <p>Hembra</p>
        <select class="form-control form-control-lg" wire:model="sexo">
            <option value="">...</option>
            <option value="0">Macho</option>
            <option value="1">Hembra</option>
        </select>
        @error('sexo')
            <span class="my-3 text-danger">{{ $message }}</span>
        @enderror
        <br>
        <div class="d-grid gap-2 mt-2">
        <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

    <hr>

    @foreach ($Atributtes as $item)
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            {{ $item->nombre }} - 
            @if ($item->mujer == true)
                Hembra
            @else
                Macho
            @endif
            <button class="btn-close" wire:click="deleteAttributes({{ $item->id }})"></button>
        </div>
    @endforeach
</div>
