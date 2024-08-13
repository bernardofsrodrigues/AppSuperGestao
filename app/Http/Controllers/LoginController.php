<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $titulo = 'Login';
        $erro = $request->get('erro');

        switch ($erro) {
            case 1:
                $mensagem = 'Usuário ou senha inválidos';
                break;
            case 2:
                $mensagem = 'Necessário realizar login para ter acesso a página';
                break;
            default:
                $mensagem = '';
            break;
        }

        return view('site.login', compact('titulo', 'mensagem'));
    }

    public function autenticar(Request $request) {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario' => 'O campo usuário (email) é obrigatório.',
            'senha' => 'O campo senha é obrigatório.'
        ];

        $request->validate($regras, $feedback);

        $email = $request->input('usuario');
        $password = $request->input('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair ()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
