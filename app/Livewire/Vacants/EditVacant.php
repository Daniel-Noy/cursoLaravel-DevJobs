<?php

namespace App\Livewire\Vacants;

use App\Livewire\Forms\VacantForm;
use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditVacant extends Component
{
    use WithFileUploads;
    
    public VacantForm $form;
    public $vacantId;
    public $image;

    #[Rule('nullable|image|max:1024')]
    public $updatedImage;

    public function mount(Vacant $vacant)
    {
        $this->form->title = $vacant->title;
        $this->form->salary_id = $vacant->salary_id;
        $this->form->category_id = $vacant->category_id;
        $this->form->company = $vacant->company;
        $this->form->deadline = Carbon::parse($vacant->deadline)->format('Y-m-d');
        $this->form->description = $vacant->description;
        $this->image = $vacant->image;

        $this->vacantId = $vacant->id;
    }

    public function edit() {
        $this->validate();
        $imageName = null;

        //? Revisar si existe una imagen nueva y eliminar la anterior
        if (isset( $this->updatedImage )) {
            $image = $this->updatedImage->store('public/img/vacants');
            $imageName = Str::replace('public/img/vacants/', '', $image);
            
            Storage::delete('/public/img/vacants/'.$this->image);
        }
        //? Actualizar la vacante
        Vacant::find($this->vacantId)
            ->update([
                ...$this->form->all(),
                'image' => $imageName ?? $this->image
            ]);

        session()->flash('message', 'La vacante se ha actualizado');
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        $salaries = Salary::all('id', 'salary')->mapWithKeys(function (Salary $item) {
            return [$item->id => $item->salary];
        });
        $categories = Category::all('id', 'name')->mapWithKeys(function (Category $item) {
            return [$item->id => $item->name];
        });

        return view('livewire.vacants.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
