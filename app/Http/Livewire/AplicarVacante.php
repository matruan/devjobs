<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class AplicarVacante extends Component
{
    use WithFileUploads; 

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
      $this->vacante = $vacante;
    }

    public function aplicar()
    {
        $datos = $this->validate();

        // save cv in local storage
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // create applicant
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
            
        ]);

        // create notification and send email

        // show message to the user saying everything is ok
    }

    public function render()
    {
        return view('livewire.aplicar-vacante');
    }
}
