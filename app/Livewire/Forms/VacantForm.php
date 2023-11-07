<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class VacantForm extends Form
{
    #[Rule('required|min:5|string')]
    public $title = '';

    #[Rule('required|integer')]
    public $salary_id = '';
    
    #[Rule('required|integer')]
    public $category_id = '';

    #[Rule('required|string')]
    public $company = '';

    #[Rule('required|date|after:today')]
    public $deadline = '';

    #[Rule('required|string|min:20')]
    public $description = '';
}
