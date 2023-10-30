<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/auth/landing.css') }}">

    <title>BrainBite</title>
  </head>
  <body>
    <div class="background-container">
      <header>
          <h1>BRAINBITE</h1>
      </header>
      <div class="container">
        <div class="div-bemvindo">
          <h1 class="bem-vindo">Bem-vindo ao BRAINBITE - Organize Seu Mundo Acadêmico!</h1>
        </div>
        <div class="card">
          <div class="div-texto">
            <h3>Você está pronto para elevar seus estudos a um novo patamar?</h3>
            <p class="texto">
              No BRAINBITE, acreditamos que a chave para o sucesso acadêmico está na organização eficiente. Dê as boas-vindas a uma experiência única, onde o caos dos estudos se transforma em harmonia e progresso.
            </p>
          </div>
        </div>
      </div>
      <div class="div-btn">
        <a href="{{ route('login') }}">Acesse Agora!</a>
      </div>
    </div>
  </body>
</html>
