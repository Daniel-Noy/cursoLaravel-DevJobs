<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
     * Store a newly created vacant in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified vacant in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified vacant from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
