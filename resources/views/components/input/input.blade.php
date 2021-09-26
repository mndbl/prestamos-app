<input type="{{ $tipo }}" step="0.01" wire:model="{{ $modelo }}"
    {{ $isRequired === 'true' ? 'required' : '' }}
    class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full hover:border-blue-500"
    placeholder={{ $texto }} value="{{ old($modelo) }}">
