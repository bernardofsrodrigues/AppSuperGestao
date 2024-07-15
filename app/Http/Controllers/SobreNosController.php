<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function SobreNos()
    {
        $titulo = 'Sobre Nós';
        return view('site.sobre-nos', compact('titulo'));
    }
}
