<label class="block">
    <span class="@error($modelo) text-red-500 @else text-gray-700 @enderror capitalize">@error($modelo) Requerido @else
    {{ $texto }} @enderror</span>
@switch($tipo)
    @case('select')
        <x-input.select modelo="{{ $modelo }}" :datos="$datos" isRequired="{{ $isRequired }}"></x-input.select>
    @break

    @default
        <x-input.input tipo="{{ $tipo }}" texto="{{ $texto }}" modelo="{{ $modelo }}"
            isRequired="{{ $isRequired }}"></x-input.input>
@endswitch
</label>
