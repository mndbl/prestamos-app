<?php

namespace App\Http\Livewire\Prestamos;

use App\Models\Profile;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.prestamos.roles', [
            'roles' => Role::paginate(5),
            'perfiles' => Profile::with('user')->get()
        ]);
    }

    public $showForm = false, $mostrarPerfiles = false, $profile_idSel;
    public $nombre, $descripcion, $rolSel, $updating = false, $deleting = false;

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        $rol = new Role;
        $rol->nombre = $this->nombre;
        $rol->descripcion = $this->descripcion;
        $rol->save();
        $this->showForm = false;
    }

    public function show($id)
    {
        $this->rolSel = Role::findOrFail($id);

        if (!$this->deleting) {
            $this->nombre = $this->rolSel->nombre;
            $this->descripcion = $this->rolSel->descripcion;
            $this->updating = true;
            $this->showForm = true;
        }
    }


    public function cancel()
    {
        $this->reset([
            'showForm', 'updating', 'nombre', 'descripcion', 'deleting'
        ]);
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string'
        ]);
        $rol = Role::findOrFail($this->rolSel->id);
        $rol->nombre = $this->nombre;
        $rol->descripcion = $this->descripcion;
        $rol->save();
        $this->cancel();
    }

    public function deleting($id)
    {
        $this->deleting = true;
        $this->show($id);
    }

    public function delete()
    {
        $rol = Role::findOrFail($this->rolSel->id);
        $rol->delete();
        $this->deleting = false;
        $this->render();
    }
}
