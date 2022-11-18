<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    {{-- Notification --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="notification" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Acción realizada con éxito
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" wire:ignore.self id="openModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form wire:submit.prevent="create">

                <div class="modal-content">

                    <div class="modal-body">
                        <h2 class="my-4">Crear Familia</h2>

                        <p class="mt-1">Nombre</p>
                        <input class="form-control form-control-lg" type="text" wire:model="modelFamilia.nombre">
                        @error('modelFamilia.nombre')
                            <span class="my-3 text-danger">Ingrese un nombre con mínimo 5 caracteres</span>
                        @enderror
                        <br>
                        <p>Orden</p>
                        <select class="form-control form-control-lg" wire:model="modelFamilia.orden_id">
                            <option value="">....</option>
                            @foreach ($ordenes as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('modelFamilia.orden_id')
                            <span class="my-3 text-danger">Seleccione una orden</span>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" wire:ignore.self id="editModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form wire:submit.prevent="update">

                <div class="modal-content">

                    <div class="modal-body">
                        <h2 class="my-4">Crear Familia</h2>

                        <p class="mt-1">Nombre</p>
                        <input class="form-control form-control-lg" type="text" wire:model="modelFamilia.nombre">
                        @error('nombre')
                            <span class="my-3 text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <p>Orden</p>
                        <select class="form-control form-control-lg" wire:model="modelFamilia.orden_id">
                            <option value="">....</option>
                            @foreach ($ordenes as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('orden_id')
                            <span class="my-3 text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    {{-- Table --}}
    <div class="row mt-5">
        <div class="col-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Familias') }}
            </h2>
        </div>
        <div class="col-6 text-end">
            <button type="button" wire:click="createModal()" class="btn btn-success">Añadir Familia</button>
        </div>
    </div>

    <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg border-0 mt-4">



        <div class="m-4">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">NOMBRE</th>
                        <th class="text-center" scope="col">ORDEN</th>
                        <th class="text-center" scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($familias as $familia)
                        <tr>
                            <td>{{ $familia->id }}</td>
                            <td>{{ $familia->nombre }}</td>
                            <td>{{ $familia->orden->nombre }}</td>
                            <td class="text-center">
                                @if ($confirming === $familia->id)
                                    <button type="button" wire:click="delete({{ $familia->id }})"
                                        class="btn btn-danger">¿Seguro?</button>
                                @else
                                    <button type="button" wire:click="confirmDelete({{ $familia->id }})"
                                        class="btn btn-danger">Eliminar</button>
                                @endif
                                <button type="button" wire:click="modalUpdate({{ $familia->id }})"
                                    class="btn btn-primary">Editar</button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.addEventListener('openModal', event => {
            $("#openModal").modal('show');
        })
    </script>
    <script>
        window.addEventListener('closeModal', event => {
            $("#openModal").modal('hide');
        })
    </script>
    <script>
        window.addEventListener('notification', event => {
            $("#notification").toast('show');
        })
    </script>

    <script>
        window.addEventListener('editModal', event => {
            $("#editModal").modal('show');
        })
    </script>
    <script>
        window.addEventListener('ECModal', event => {
            $("#editModal").modal('hide');
        })
    </script>
</div>
