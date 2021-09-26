<?php

namespace App\View\Components\input;

use Illuminate\View\Component;

class Select extends Component
{
    public $datos, $modelo, $isRequired;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datos, $modelo, $isRequired)
    {
        $this->datos = $datos;
        $this->modelo = $modelo;
        $this->isRequired = $isRequired;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.select');
    }
}
