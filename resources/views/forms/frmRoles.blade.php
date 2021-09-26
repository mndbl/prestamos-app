<div class="bg-gray-100 rounded-lg m-2 p-4 border-2 border-blue-300">
    <div class="bg-blue-500 -mt-4 -mx-4 rounded-t-lg p-4">
        <h1 class="text-gray-100">{{ $updating ? 'Actualizar rol' : 'Registrar Rol' }}</h1>
    </div>
    <form wire:submit.prevent="{{ $updating ? 'update' : 'store' }}" class="text-sm space-y-1">
        <x-input.campo :datos="[]" tipo="text" modelo="nombre" texto="Nombre" isRequired="true"></x-input.campo>
        <x-input.campo :datos="[]" tipo="text" modelo="descripcion" texto="Descripción" isRequired="true">
        </x-input.campo>
        <button type="submit"
            class="mt-4 border-2 border-blue-600 text-gray-700 py-2 px-4 rounded-lg w-full hover:bg-blue-500 hover:text-white">
            {{ $updating ? 'Actualizar' : 'Guardar' }}
        </button>
        <button type="button" wire:click="cancel"
            class="mt-4 border-2 border-red-600 text-gray-700 py-2 px-4 rounded-lg w-full hover:bg-red-500 hover:text-white">
            cancelar
        </button>
    </form>
</div>
