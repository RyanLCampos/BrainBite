<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CadastroController extends Controller
{

    public function mostrarFormCadastro()
    {
        return view('auth.cadastro');
    }


    public function cadastro(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        // Redirecionamento após o cadastro
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso. Faça o login para acessar sua conta.');
    }
}
