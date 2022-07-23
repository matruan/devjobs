<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

class EditarVacante extends Component
{
    public $titulo;

    public function mount(Vacante $vacante)
    {
        $this->titulo = $vacante->titulo;
    }

    public function render()
    {
        // Querying the database
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', 
          [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
