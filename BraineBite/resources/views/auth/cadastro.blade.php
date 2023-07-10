<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/auth/cadastro.css') }}">

    <title>BrainBite - Cadastro</title>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <form method="POST" action="{{ route('cadastro') }}">
	    @csrf
            <h1>Cadastro</h1>

            <div class="label-float">
                <input type="name" id="name" name="name" paceholder="" required />
                <label for="name">Nome</label>
            </div>

            <div class="label-float">
                <input type="email" id="email" name="email" paceholder="" required />
                <label for="email">Email</label>
            </div>

            <div class="label-float">
                <input type="password" id="password" paceholder="" name="password" required />
                <label for="senha">Senha</label>
            </div>

            <div class="justify-center">
            <button>Cadastrar</button>
            </div>
        </form>
        <div class="justify-center">
          <hr />
        </div>

        <p>
          Já tem uma conta?
          <a href="{{ route('login') }}">
            Entrar
          </a>
        </p>
      </div>
    </div>
  </body>
</html>