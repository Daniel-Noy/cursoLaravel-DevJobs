<?php

namespace App\Livewire\Vacants;

use App\Livewire\Forms\CreateVacantForm;
use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateVacant extends Component
{
    use WithFileUploads;
    public CreateVacantForm $form;
    #[Rule('required|image')]
    public $image;

    public function save()
    {
        $this->validate();

        //? Guardar la imagen
        $image = $this->image->store('public/img/vacants');
        $imageName = Str::replace('public/img/vacants/', '', $image);

        // //? Guardar la vacante
        Vacant::create([
            ...$this->form->all(),
            'image' => $imageName,
            'user_id' => auth()->user()->id
        ]);

        session()->flash('message', 'Vacante publicada correctamente');
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

        return view('livewire.vacants.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
            
        ]);
    }
}
