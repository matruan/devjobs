<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

class EditarVacante extends Component
{
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;

    public function mount(Vacante $vacante)
    {
      $this->titulo = $vacante->titulo;
      $this->salario_id = $vacante->salario_id;
      $this->categoria_id = $vacante->categoria_id;
      $this->empresa = $vacante->empresa;
      $this->ultimo_dia = $vacante->ultimo_dia->format('Y-m-d');
      $this->descripcion = $vacante->descripcion;
      $this->imagen = $vacante->imagen;
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
