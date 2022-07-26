<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AplicarVacante extends Component
{
    use WithFileUploads; 

    public $cv;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function aplicar()
    {
        $datos = $this->validate();

        // save cv in local storage
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // create applicant

        // create notification and send email

        // show message to the user saying everything is ok
    }

    public function render()
    {
        return view('livewire.aplicar-vacante');
    }
}
