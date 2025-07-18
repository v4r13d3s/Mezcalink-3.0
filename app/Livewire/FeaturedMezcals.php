<?php

namespace App\Livewire;

use Livewire\Component;

class FeaturedMezcals extends Component
{
    public $mezcales = [];

    public function mount()
{
    // Aquí puedes obtener los mezcales destacados de la base de datos
    $this->mezcales = \App\Models\Mezcal::take(5)->get();
}

    public function render()
    {
        return view('livewire.featured-mezcals');
    }
}
