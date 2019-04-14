<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Cadastro de Animais</title>
</head>

<body>
  

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('bichos.index') }}">Principal</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('bichos.create') }}">Inclusão</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('bichos.contagem') }}">Estatística</a>
        </li>
      </ul>
    </nav>
    <br>
    <h3 style="text-align: center">Expofeira 2019</h3>

    <div class="container">

      @yield('conteudo')

    </div>
</body>

</html>