<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
class PrincipalController extends Controller
{
    public function Principal()
    {
        $titulo = 'Home';
        $motivo_contatos = MotivoContato::all();
        return view('site.principal', compact('titulo', 'motivo_contatos'));
    }
}
