<?php

namespace App\Livewire\Vacants;

use App\Models\Applicant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApplyVacant extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    #[Rule('required|mimes:pdf')]
    public $cv;
    public int $vacantId;
    public bool $isApplied;

    public function mount() {
        $this->isApplied = auth()->user()->applies->contains($this->vacantId);
    }

    public function save()
    {
        $this->authorize('create', Applicant::class);
        $this->validate();

        //? Guardar el CV
        $cv = $this->cv->store('public/cv');
        $cvName = Str::replace('public/cv/', '', $cv);

        //? Crear el registro
        Applicant::create([
            'user_id' => auth()->user()->id,
            'vacant_id' => $this->vacantId,
            'cv' => $cvName
        ]);
        $this->isApplied = true;
    }

    public function render()
    {
        return view('livewire.vacants.apply-vacant');
    }
}
