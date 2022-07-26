<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AplicarVacante extends Component
{
    public $cv;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function aplicar()
    {
        $this->validate();

        // save cv in local storage

        // create applicant

        // create notification and send email

        // show message to the user saying everything is ok
    }

    public function render()
    {
        return view('livewire.aplicar-vacante');
    }
}
