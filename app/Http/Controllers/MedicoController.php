<?php

namespace App\Http\Controllers;

class MedicoController extends Controller
{
    public function index() {
        return view('medico.index');
    }
}
