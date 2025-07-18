<?php

namespace App\Livewire;

use Livewire\Component;

class FeaturedMezcals extends Component
{

    public $precioMin = 0;
    public $precioMax = 2000;
    /* public $tipoMezcal = []; */
    public $tipoAgave = [];
    public $state = [];
    /* public $categoria = []; */
    public $mezcales = [];

public function updated($propertyName)
{
    $this->filtrarMezcales();
}

    public function filtrarMezcales()
    {
        $query = \App\Models\Mezcal::query();
    
        // Filtro por precio
        $query->whereBetween('precio_regular', [$this->precioMin, $this->precioMax]);
    
        // Filtro por tipo de mezcal
        /* if (!empty($this->tipoMezcal)) {
            $query->whereIn('tipo', $this->tipoMezcal);
        } */
    
        // Filtro por tipo de agave
        if (!empty($this->tipoAgave)) {
            $query->whereIn('agave', $this->tipoAgave);
        }
    
        // Filtro por región
        if (!empty($this->state)) {
            $query->whereIn('state_id', $this->state);
        }
    
        /* // Filtro por categoría
        if (!empty($this->categoria)) {
            $query->whereIn('categoria_id', $this->categoria);
        } */
    
        $this->mezcales = $query->get();
    }
    
    public function mount()
    {
        $this->filtrarMezcales();

        // Aquí puedes obtener los mezcales destacados de la base de datos
        $this->mezcales = \App\Models\Mezcal::take(5)->get();
    }

    public function render()
    {
        return view('livewire.featured-mezcals');
    }
}
