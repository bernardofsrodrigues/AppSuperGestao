<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function Contato()
    {
        $titulo = 'Contato';
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', compact('titulo', 'motivo_contatos'));
    }

    public function salvar(Request $request)
    {
        //var_dump($_POST);
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'required' => 'O campo :atribute deve ser preenchido',

            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
