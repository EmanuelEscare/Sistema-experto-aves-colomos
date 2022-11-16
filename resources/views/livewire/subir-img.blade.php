<div>
    <div class="card shadow rounded-4 border-0">
        <div class="m-3">
            <h3>Ayudanos a llenar este formulario para poder registrar esta ave</h3>
            <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="formFile" class="form-label">Subir ilustración de el ave (Dibujo o fotografía)</label>
                <input class="form-control" type="file" wire:model="img">
                <p> @error('img') <span class="error">{{ $message }}</span> @enderror</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Describe la ubicación y características de el ave (Ejemplo: Tamaño, Color y Hábitat)</label>
                <textarea wire:model="info" class="form-control" rows="3"></textarea>
            <p> @error('info') <span class="error">{{ $message }}</span> @enderror</p>  
            </div>
    <br>
              <button type="submit" @disabled($this->validation) class="btn btn-primary ms-auto">Guardar</button>
            </form>
            </div>
    </div>
<br>
@if ($this->validation)
<div class="card shadow border-0 bg-success text-white">
    <div class="m-4">
        Ave registrada
    </div>
</div>
@endif
    {{-- <script>
        window.addEventListener('notification', event => {
            $("#notification").toast('show');
        })
    </script> --}}
</div>

