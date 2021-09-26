<div class="w-full min-h-full lg:flex">
    <div class="md:w-full lg:w-1/4 lg:border-r-2 border-solid border-gray-300">
        @include('forms.frmCalculadora')
    </div>
    <div class="md:w-full lg:w-3/4 p-2">
        <table class="table w-2/3 mx-auto">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Monto</th>
                    <th>Mto</th>
                    <th>Interés</th>
                    <th>Amortizado</th>
                    <th>Vivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuotas as $cuota)
                    <tr>
                        <td>{{ $cuota['numero'] }}</td>
                        <td class="text-right">{{ $cuota['cuota'] }}</td>
                        <td class="text-right">{{ $cuota['mto'] }}</td>
                        <td class="text-right">{{ $cuota['interes'] }}</td>
                        <td class="text-right">{{ $cuota['amortizado'] }}</td>
                        <td class="text-right">{{ $cuota['vivo'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="w-2/3 ml-8">
            <div>Mto Generado: {{ number_format($mtoGen, 2, ',', '.') }}</div>
            <div>Interés Generado: {{ number_format($intGen, 2, ',', '.') }}</div>
            <div>Total: {{ number_format($totalGen, 2, ',', '.') }}</div>
        </div>
    </div>
</div>

<div class="bg-black bg-opacity-30 min-h-screen absolute inset-0 items-center justify-center" wire:loading="calcular">
    <div class="text-white w-1/5 mx-auto py-20">
        <x-logo></x-logo>
    </div>
</div>

</div>
