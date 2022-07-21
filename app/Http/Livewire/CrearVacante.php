<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo'=>'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    public function crearVacante(){
        $datos = $this->validate();

        // Store image
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        // dd($nombre_imagen);

        // Save vacant
        Vacante::create([
          'titulo' => $datos['titulo'],
          'salario_id' => $datos['salario_id'],
          'categoria_id' => $datos['categoria_id'],
          'empresa' => $datos['empresa'],
          'ultimo_dia' => $datos['ultimo_dia'],
          'descripcion' => $datos['descripcion'],
          'imagen' => $datos['imagen'],
          'user_id' => auth()->user()->id,
        ]);

        // Show message
        session()->flash('mensaje', 'La vacante se publicó correctamente');

        // Redirect user
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
