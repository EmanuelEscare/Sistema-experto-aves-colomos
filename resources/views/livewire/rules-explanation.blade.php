<div>
    {{-- Stop trying to control. --}}
    @if ($paso[3] == false)
    <h1 class="text-left m-5">Encontrar Ave</h1>

    <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg rounded-4 border-0">
        <div class="m-3 body2">

            <div class="fondo">
                <br>

                @if ($paso[0] == true)
                    <div class="col-sm-3" class="my-3">
                        <h5 class="mb-2">
                            <p>¿De que tamaño es el ave? </p>
                        </h5>

                        <div class="btn-toolbar ">
                            <div class="btn-space" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio"
                                    {{ $flag[0] == true ? 'disabled' : '' }} {{ $size == 1 ? 'checked' : '' }}
                                    wire:click="ruleOne({{ '1' }})" id="btnradio1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio1">Pequeña</label>

                                <input type="radio" class="btn-check" name="btnradio"
                                    {{ $flag[0] == true ? 'disabled' : '' }} {{ $size == 2 ? 'checked' : '' }}
                                    wire:click="ruleOne({{ '2' }})" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Mediana</label>

                                <input type="radio" class="btn-check" name="btnradio"
                                    {{ $flag[0] == true ? 'disabled' : '' }} {{ $size == 3 ? 'checked' : '' }}
                                    wire:click="ruleOne({{ '3' }})" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3">Grande</label>
                            </div>
                        </div>

                    </div>
                @endif
                @if ($paso[1] == true)

                    <div class="my-3">

                        <h5 class="mb-2">
                            <p>¿En que hábitat lo vio? </p>
                        </h5>
                        @foreach ($habitats as $habitat)
                            <button type="button"
                                class="btn btn-secondary btn-space btn-margen {{ $habitaSelect == $habitat['id'] ? 'border-primary border border-3' : '' }}"
                                wire:click="ruleTwoSave({{ $habitat['id'] }})"
                                {{ $flag[1] == true ? 'disabled' : '' }}>{{ $habitat['nombre'] }}</button>
                        @endforeach


                @endif
            </div>
            @if ($paso[2] == true)
                <div class="my-3">
                    <h5 class="mb-2">
                        <p>Selecciona una opción que describa al ave...</p>
                    </h5>
                    @foreach ($attributes as $attribute)
                        <button type="button"
                            class="btn btn-warning {{ $attributeSelect == $attribute['id'] ? 'border-primary border border-3' : '' }}"
                            wire:click="result({{ $attribute['id'] }})"
                            {{ $flag[2] == true ? 'disabled' : '' }}>{{ $attribute['nombre'] }}</button>
                    @endforeach
                </div>
            @endif
        </div>
        <br>
    </div>
</div>
@endif

@if ($paso[3] == true && $this->nuevaAve == false)
<h1 class="m-5"> Ave encontrada</h1>

    <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg rounded-4 border-0">
        {{-- RESULT --}}
        <div class="m-3">
            <div class="my-3" class="col-md-8">
                <h2 class="text-center mt-5">{{ $this->ave->nombre }}</h2>
            </div>
<br>
<br>
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img src=""
                                class="img-fluid rounded" alt="...">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                    </div>
                </div>

                {{-- Modulo Explicacion --}}
                <br>
                <div style="background: #dbdbdb;" class="rounded p-3">
                    <h5>Con base a lo contestado, nos hemos encontrado al ave, con respecto a estas caracterisitcas:
                    </h5>

                    <p class="m-1">El ave es de tamaño: <span class="fw-bold"> {{ $sizeName }} </span></p>
                    <p class="m-1">Su hábitat es: <span class="fw-bold"> {{ $habitaName }} </span></p>
                    <p class="m-1">Sus caracteristicas es: <span class="fw-bold"> {{ $nombreBuscar }} </span></p>

                </div>
                <br>
            </div>
            <br>
            <h5> ¿Es el ave que buscabas? </h5>
            <button class="btn btn-warning mt-2" wire:click="nuevaAve()">No, no es el ave que buscaba</button>
            <button class="btn btn-primary mt-2">Si, buscar otra ave <i class="fa-solid fa-magnifying-glass ms-1"></i></button>

        </div>
    </div>
@endif

@if ($this->nuevaAve == true)
<h1 class="m-5"> Ave no encontrada</h1>

    <livewire:subir-img />
@endif



</div>
