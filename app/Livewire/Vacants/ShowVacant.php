<?php

namespace App\Livewire\Vacants;

use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ShowVacant extends Component
{
    public Vacant $vacant;

    public function render()
    {
        return view('livewire.vacants.show-vacant');
    }
}
