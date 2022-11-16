<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
{{-- Subir image--}}



<div class="form-group">

<label for="fotimg">Foto del Ave:</label>

<input type="file" class="form-control" id="fotoimg" wire:model="file">

@error('name') <span class="text-danger">{{ $message }}</span> @enderror

</div>

<br>
<button type="submit" class="btn btn-success">Guardar</button>

</form>

<script>
        window.addEventListener('openModal', event => {
            $("#openModal").modal('show');
        })
    </script>