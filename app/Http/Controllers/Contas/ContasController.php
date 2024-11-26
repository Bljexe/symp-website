<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Contas;

class ContasController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'cuenta' => 'required|string|max:30|unique:mysql2.cuentas,cuenta',
                'contraseña' => 'required|string|min:8',
                'email' => 'required|email|unique:mysql2.cuentas,email',
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'pais' => 'required|string|max:255',
                'pregunta' => 'required|string|max:255',
                'respuesta' => 'required|string|max:255',
                'apodo' => 'required|string|max:255',
            ],
            [
                'cuenta.required' => 'O campo conta é obrigatório.',
                'cuenta.string' => 'O campo conta deve ser uma string.',
                'cuenta.max' => 'O campo conta deve ter no máximo 30 caracteres.',
                'cuenta.unique' => 'A conta já está em uso.',
                'contraseña.required' => 'O campo senha é obrigatório.',
                'contraseña.string' => 'O campo senha deve ser uma string.',
                'contraseña.min' => 'O campo senha deve ter no mínimo 8 caracteres.',
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um email válido.',
                'email.unique' => 'O email já está em uso.',
                'nombre.required' => 'O campo nome é obrigatório.',
                'nombre.string' => 'O campo nome deve ser uma string.',
                'nombre.max' => 'O campo nome deve ter no máximo 255 caracteres.',
                'apellido.required' => 'O campo sobrenome é obrigatório.',
                'apellido.string' => 'O campo sobrenome deve ser uma string.',
                'apellido.max' => 'O campo sobrenome deve ter no máximo 255 caracteres.',
                'pais.required' => 'O campo país é obrigatório.',
                'pais.string' => 'O campo país deve ser uma string.',
                'pais.max' => 'O campo país deve ter no máximo 255 caracteres.',
                'pregunta.required' => 'O campo pergunta é obrigatório.',
                'pregunta.string' => 'O campo pergunta deve ser uma string.',
                'pregunta.max' => 'O campo pergunta deve ter no máximo 255 caracteres.',
                'respuesta.required' => 'O campo resposta é obrigatório.',
                'respuesta.string' => 'O campo resposta deve ser uma string.',
                'respuesta.max' => 'O campo resposta deve ter no máximo 255 caracteres.',
                'apodo.required' => 'O campo apelido é obrigatório.',
                'apodo.string' => 'O campo apelido deve ser uma string.',
                'apodo.max' => 'O campo apelido deve ter no máximo 255 caracteres.',
            ],
        );

        $conta = Cuenta::create([
            'cuenta' => $request->input('cuenta'),
            'contraseña' => $request->input('contraseña'),
            'email' => $request->input('email'),
            'nombre' => $request->input('nombre', ''),
            'apellido' => $request->input('apellido', ''),
            'pais' => $request->input('pais', 'ES'),
            'idioma' => 'pt',
            'ipRegistro' => $request->ip(),
            'cumpleaños' => '14~4~1994',
            'pregunta' => $request->input('pregunta', ''),
            'respuesta' => $request->input('respuesta', ''),
            'apodo' => $request->input('apodo', ''),
            'ultimaIP' => $request->ip(),
        ]);

        Contas::create([
            'user_id' => auth()->id(),
            'cuenta_id' => $conta->id,
        ]);

        return redirect()->back()->with('success', 'Conta criada com sucesso!');
    }
}
