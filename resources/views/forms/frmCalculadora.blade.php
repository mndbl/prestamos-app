<div class="bg-gray-100 rounded-lg m-2 p-4 border-2 border-blue-300">
    <div class="bg-blue-500 -mt-4 -mx-4 rounded-t-lg p-4">
        <h1 class="text-gray-100">Calcular Préstamos</h1>
    </div>
    <form wire:submit.prevent="calcular" class="text-sm space-y-1">
        <x-input.campo :datos="$opcionesSistemas" tipo="select" modelo="sistema" texto="Sistemas" isRequired="true">
        </x-input.campo>
        <x-input.campo :datos="$opcionesPeriodos" tipo="select" modelo="periodo" texto="Períodos" isRequired="true">
        </x-input.campo>
        <x-input.campo :datos="[]" tipo="number" modelo="plazo" texto="Plazo" isRequired="true"></x-input.campo>
        <x-input.campo :datos="[]" tipo="number" modelo="capital" texto="Capital" isRequired="true"></x-input.campo>
        <x-input.campo :datos="[]" tipo="number" modelo="tasa" texto="Tasa" isRequired="true"></x-input.campo>
        <x-input.campo :datos="[]" tipo="number" modelo="mto" texto="Mto" isRequired="true"></x-input.campo>
        <button type="submit"
            class="mt-4 border-2 border-blue-600 text-gray-700 py-2 px-4 rounded-lg w-full hover:bg-blue-500 hover:text-white">Calcular</button>
    </form>
</div>
