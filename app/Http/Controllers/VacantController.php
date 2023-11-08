<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Contracts\View\View;

class VacantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of vacants.
     */
    public function index(): View
    {
        return view('recruiter.vacants.index');
    }

    /**
     * Show the form for creating a new vacant.
     */
    public function create(): View
    {
        return view('recruiter.vacants.create');
    }

    /**
     * Display the specified vacant.
     */
    public function show(string $id)
    {
        //
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
