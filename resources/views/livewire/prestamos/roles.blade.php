<div class="w-full lg:w-2/3 mx-auto p-2">
    <button type="button" wire:click="$set('showForm', true)"
        class="mt-4 border-2 border-blue-600 text-blue-700 py-2 px-4 rounded-t-lg w-full hover:bg-blue-500
        hover:text-white">
        Nuevo Rol
    </button>
    @if ($showForm)
        <x-modal>
            @include('forms.frmRoles')
        </x-modal>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Descripción</th>
                <th colspan="2">Opciones</th>
            </tr>
        <tbody>
            @forelse ($roles as $rol)
                <tr>
                    <td>{{ $rol->nombre }}</td>
                    <td>{{ $rol->descripcion }}</td>
                    <td class="grid grid-cols-2 lg:px-4">
                        <button wire:click="show({{ $rol->id }})"
                            class="w-full rounded-l-md bg-green-600 text-white">Editar</button>
                        <button wire:click="deleting({{ $rol->id }})"
                            class="w-full rounded-r-md bg-red-600 text-white">Borrar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay roles registrados</td>
                </tr>
            @endforelse
        </tbody>
        </thead>
    </table>

    @include('sections.assign-roles')

    @if ($deleting)
        <div class="absolute inset-2 mx-auto w-1/3 uppercase">
            <div class="bg-red-500 rounded-t-md pl-6 py-3 text-white font-bold">
                <p class="animate-pulse">Confirme</p>
            </div>
            <div class="bg-white px-4 py-2">Desea eliminar el Rol: {{ $rolSel->nombre }}</div>
            <div class="bg-white p-4 grid grid-cols-2 text-white">
                <button wire:click="delete" class="bg-red-500 w-full rounded-l-md">Confirmar</button>
                <button class="bg-gray-400 w-full rounded-r-md" wire:click="cancel">Cancelar</button>
            </div>
        </div>
    @endif
</div>
