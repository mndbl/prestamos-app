<select wire:model="{{ $modelo }}" {{ $isRequired === 'true' ? 'required' : '' }}
    class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white rounded text-sm border border-gray-400 outline-none hover:border-blue-500 focus:outline-none focus:ring w-full">
    <option value="">Seleccione</option>
    @foreach ($datos as $item)
        <option value="{{ $item }}" class="capitalize">{{ $item }}</option>
    @endforeach
</select>
