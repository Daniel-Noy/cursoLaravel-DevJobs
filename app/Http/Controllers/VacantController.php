<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Contracts\View\View;

class VacantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])
        ->except('show');
    }
    /**
     * Display a listing of vacants.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Vacant::class);

        return view('recruiter.vacants.index');
    }

    /**
     * Show the form for creating a new vacant.
     */
    public function create(): View
    {
        $this->authorize('create', Vacant::class);
        
        return view('recruiter.vacants.create');
    }

    /**
     * Display the specified vacant.
     */
    public function show(Vacant $vacant): View
    {
        return view('vacant.show', [
            'vacant' => $vacant
        ]);
    }

    /**
     * Show the form for editing the specified vacant.
     */
    public function edit(Vacant $vacant): View
    {
        $this->authorize('update', $vacant);
        
        return view('recruiter.vacants.edit', [
            'vacant' => $vacant
        ]);
    }
}
