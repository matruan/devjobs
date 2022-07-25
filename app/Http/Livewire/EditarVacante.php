<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

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
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
      'titulo'=>'required|string',
      'salario_id' => 'required',
      'categoria_id' => 'required',
      'empresa' => 'required',
      'ultimo_dia' => 'required',
      'descripcion' => 'required',
      'imagen_nueva' => 'nullable|image|max:1024'

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

      // If a new image exists
      if ($this->imagen_nueva){
        $imagen = $this->imagen_nueva->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
      }
      
      // Find the vacant to edit
      $vacante = Vacante::find($this->vacante_id);

      // Assigning the new values
      $vacante->titulo = $datos['titulo'];
      $vacante->salario_id = $datos['salario_id'];
      $vacante->categoria_id = $datos['categoria_id'];
      $vacante->empresa = $datos['empresa'];
      $vacante->ultimo_dia = $datos['ultimo_dia'];
      $vacante->descripcion = $datos['descripcion'];
      $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;


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
