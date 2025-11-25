<?php

namespace App\Livewire\Beers;

use App\Livewire\Forms\BeerForm;
use Livewire\Component;

class Create extends Component
{
    public BeerForm $form;

    public function save()
    {
        $beer = $this->form->store();
        
        return redirect(route('beers.index'))->success("{$beer->name} criada com sucesso!");
    }

    public function render()
    {
        return view('livewire.beers.create');
    }
}
