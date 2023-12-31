<?php

namespace App\Livewire\Admin\Options;

use App\Livewire\Forms\Admin\Options\NewOptionForm;
use App\Models\Feature;
use App\Models\Option;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageOptions extends Component
{
    public $options;
    public NewOptionForm $newOption;    //enlaza con el form object

    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    // actualizar informacion de $options
    #[On('featureAdded')]
    public function updateOptionList()
    {
        $this->options = Option::with('features')->get();

    }

    public function addFeature()
    {
        $this->newOption->addFeature();
    }  
    
    
    // elimina features desde dentro del modal
    public function removeFeature($index)
    {
        $this->newOption->removeFeature($index);
    }

    // elimina features desde la lista de opciones
    public function deleteFeature(Feature $feature)
    {
       $feature->delete();
       $this->options = Option::with('features')->get();
    }

    //elimina la opcion 
    public function deleteOption(Option $option)
    {
        $option->delete();
        $this->options = Option::with('features')->get();
    }

    public function addOption()
    {
        $this->newOption->save();
        
        $this->options = Option::with('features')->get();

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Perfecto!',
            'text' => 'La opción se agregó correctamente'
        ]);
        
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
