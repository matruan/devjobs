<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
      'titulo'=>'required|string',
      'salario_id' => 'required',
      'categoria_id' => 'required',
      'empresa' => 'required',
      'ultimo_dia' => 'required',
      'descripcion' => 'required'
    ];

    public function mount(Vacante $vacante)
    {
      $this->vacante_id = $vacante->id;
      $this->titulo = $vacante->titulo;
      $this->salario_id = $vacante->salario_id;
      $this->categoria_id = $vacante->categoria_id;
      $this->empresa = $vacante->empresa;
      $this->ultimo_dia = $vacante->ultimo_dia->format('Y-m-d');
      $this->descripcion = $vacante->descripcion;
      $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
      $datos = $this->validate();

      // Si hay una nueva imagen
      
      // Encontrar la vacante a editar
      $vacante = Vacante::find($this->vacante_id);

      // Asignar los valores
      $vacante->titulo = $datos['titulo'];
      $vacante->salario_id = $datos['salario_id'];
      $vacante->categoria_id = $datos['categoria_id'];
      $vacante->empresa = $datos['empresa'];
      $vacante->ultimo_dia = $datos['ultimo_dia'];
      $vacante->descripcion = $datos['descripcion'];


      // Guardar la vacante
      $vacante->save();

      // Redireccionar
      session()->flash('mensaje', 'La vacante se actualizó correctamente');

      return redirect()->route('vacantes.index');

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
