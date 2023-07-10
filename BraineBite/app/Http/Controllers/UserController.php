<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::get();

        return view('user.index', compact('usuarios'));
    }

    public function show($id)
    {
        
    }

    public function mostrarFormEditar($id)
    {
        $usuario = User::findOrFail($id);

        return view('user.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $usuario = User::findOrFail($id);
        $usuario->name = $validatedData['name'];
        $usuario->email = $validatedData['email'];
        $usuario->save();

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function excluir($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return view('user.excluir', compact('usuario'));
        return redirect()->route('user.index')->with('success', 'Usuário removido com sucesso.');
    }

}
