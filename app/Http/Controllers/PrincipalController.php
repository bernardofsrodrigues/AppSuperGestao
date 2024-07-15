<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function Principal()
    {
        $titulo = 'Home';
        return view('site.principal', compact('titulo'));
    }
}
