<?php

namespace App\View\Components\input;

use Illuminate\View\Component;

class Campo extends Component
{
    public $datos, $tipo, $modelo, $texto, $isRequired;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datos, $tipo, $modelo, $texto, $isRequired)
    {
        $this->datos = $datos;
        $this->tipo = $tipo;
        $this->modelo = $modelo;
        $this->texto = $texto;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.campo');
    }
}
