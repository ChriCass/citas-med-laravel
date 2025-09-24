<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CajeroController extends Controller
{
    public function index() {
        return view('cajero.index');
    }

    public function pagos() {
        return 'Listado de pagos';
    }
}
