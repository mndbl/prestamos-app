<?php

namespace App\Http\Livewire\Prestamos;

use Livewire\Component;
use SebastianBergmann\CodeCoverage\StaticAnalysisCacheNotConfiguredException;

class Calculadoras extends Component
{
    public $sistema = 'francés', $monto, $capital = 50000, $capitalVivo, $periodo = 'mensual', $tasa = 25, $tasaEfectiva,
        $mto = 2.5, $mtoEfectiva, $plazo = 12, $calculado = false, $cuotas = [], $intGen, $totalGen, $tasaTotal;

    public $opcionesPeriodos = [
        'diario',
        'semanal',
        'quincenal',
        'mensual',
        'bimestral',
        'trimestral',
        'semestral',
        'anual',
    ];

    public $opcionesSistemas = [
        'francés',
        'alemán',
        'EEUU',
        'al vencimiento',
    ];

    public function render()
    {
        return view('livewire.prestamos.calculadoras');
    }



    public function calTasaEfectiva()
    {
        switch ($this->periodo) {
            case 'diaria':
                $this->tasaEfectiva = $this->tasa / 360 / 100;
                $this->mtoEfectiva = $this->mto / 30 / 100;
                break;
            case 'semanal':
                $this->tasaEfectiva = $this->tasa / 52 / 100;
                $this->mtoEfectiva = $this->mto / 30 * 7 / 100;
                break;
            case 'mensual':
                $this->tasaEfectiva = $this->tasa / 12 / 100;
                $this->mtoEfectiva = $this->mto / 100;
                break;
            case 'bimestral':
                $this->tasaEfectiva = $this->tasa / 6 / 100;
                $this->mtoEfectiva = $this->mto * 2 / 100;
                break;
            case 'trimestral':
                $this->tasaEfectiva = $this->tasa / 6 / 100;
                $this->mtoEfectiva = $this->mto * 3 / 100;
                break;
            case 'semestral':
                $this->tasaEfectiva = $this->tasa / 6 / 100;
                $this->mtoEfectiva = $this->mto * 6 / 100;
                break;
            case 'anual':
                $this->tasaEfectiva = $this->tasa / 6 / 100;
                $this->mtoEfectiva = $this->mto * 12 / 100;
                break;
            default:
                return 'seleccione un período';
                break;
        }
    }

    public function calcular()
    {
        $this->validate(
            [
                'sistema' => 'required|string',
                'periodo' => 'required|string',
                'capital' => 'required',
                'tasa' => 'required',
                'mto' => 'required',
                'plazo' => 'required',
            ]
        );

        $this->monto = $this->capital;
        $this->capitalVivo = $this->capital;
        $this->calTasaEfectiva();
        $this->tasaTotal = $this->tasaEfectiva + $this->mtoEfectiva;

        switch ($this->sistema) {
            case 'alemán':
                $this->sistAleman();
                break;

            case 'EEUU':
                $this->sistEEUU();
                break;

            case 'francés':
                $this->sistFrances();
                break;
        }

        $this->calculado = true;
    }

    public $mtoGen;

    public function sistFrances()
    {
        //calcular cuota método francés a=Co ( i x (1 + i)n / (1 + i)n - 1)
        //i x (1 + i)n
        $numerador = $this->tasaTotal * pow(1 + $this->tasaTotal, $this->plazo);
        // (1+i)n - 1
        $denominador = pow(1 + $this->tasaTotal, $this->plazo) - 1;
        // i x (1 + i)n / (1 + i)n - 1
        $factor = $numerador / $denominador;

        $this->cuota = $this->monto * $factor;

        //construir
        $this->reset([
            'cuotas', 'mtoGen', 'intGen'
        ]);

        for ($i = 1; $i < $this->plazo + 1; $i++) {
            $this->cuotas[$i] = [
                'numero' => $i,
                'cuota' => number_format($this->cuota, 2, ',', '.'),
                'mto' => number_format($mto = $this->capitalVivo * $this->mtoEfectiva, 2, ',', '.'),
                'interes' => number_format($interes = $this->capitalVivo * $this->tasaEfectiva, 2, ',', '.'),
                'amortizado' => number_format($amortizado = $this->cuota - $interes - $mto, 2, ',', '.'),
                'vivo' => number_format($this->capitalVivo = $this->capitalVivo - $amortizado, 2, ',', '.'),
                'mtoGen' => number_format($this->mtoGen = $this->mtoGen + $mto, 2, ',', '.'),
                'intGen' => number_format($this->intGen = $this->intGen + $interes, 2, ',', '.'),
            ];
        }
        $this->totalGen = $this->cuota * $this->plazo;
    }

    public function sistAleman()
    {
        $this->cuota = $this->monto / $this->plazo;
        //construir tabla
        for ($i = 1; $i < $this->plazo + 1; $i++) {
            $this->cuotas[$i] = [
                'numero' => ($i),
                'cuota' => number_format($this->cuota + $this->capitalVivo * $this->tasaTotal, 2, ',', '.'),
                'interes' => number_format($this->capitalVivo * $this->tasaTotal, 2, ',', '.'),
                'amortizado' => number_format($amortizado = $this->cuota, 2, ',', '.'),
                'vivo' => number_format($this->capitalVivo = $this->capitalVivo - $amortizado, 2, ',', '.')
            ];
            $this->intGen = $this->intGen + $this->capitalVivo * $this->tasaTotal;
        }
        $this->totalGen = $this->cuota * $this->plazo + $this->intGen;
    }

    public function sistEEUU()
    {
        //construir tabla
        for ($i = 1; $i < $this->plazo + 1; $i++) {
            if ($i < $this->plazo) {

                $this->cuotas[$i] = [
                    'numero' => ($i),
                    'cuota' => number_format($this->capitalVivo * $this->tasaTotal, 2, ',', '.'),
                    'interes' => number_format($this->capitalVivo * $this->tasaTotal, 2, ',', '.'),
                    'amortizado' => number_format(0, 2, ',', '.'),
                    'vivo' => number_format($this->capitalVivo, 2, ',', '.')
                ];
            } else {
                $this->cuotas[$i] = [
                    'numero' => ($i),
                    'cuota' => number_format($this->capitalVivo, 2, ',', '.'),
                    'interes' => number_format($this->capitalVivo * $this->tasaTotal, 2, ',', '.'),
                    'amortizado' => number_format($this->capitalVivo, 2, ',', '.'),
                    'vivo' => number_format($this->capitalVivo - $this->capitalVivo, 2, ',', '.')
                ];
            }
        }
        $this->intGen = $this->capitalVivo * $this->tasaTotal * $this->plazo;
        $this->totalGen = $this->capitalVivo + $this->capitalVivo * $this->tasaTotal * $this->plazo;
    }

    public function borrar()
    {
        $this->reset([
            'monto', 'periodo', 'tasa', 'plazo', 'calculado', 'tasaEfectiva', 'mto', 'mtoEfectiva', 'tasaTotal', 'mtoGen', 'intGen',
        ]);
    }
}
