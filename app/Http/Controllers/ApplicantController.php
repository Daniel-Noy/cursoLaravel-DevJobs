<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Show the applicants for the vacancy
     */
    public function index(Vacant $vacant): View
    {
        return view('applicants.index', [
            'vacant' => $vacant
        ]);
    }
}
