<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        input{
            color: #fff;
        }
    </style>
</head>
<body style="background:#1d1f3a; min-height:100vh">
    <div class="container" style="height: 100vh; display:flex; align-items:center; width:100vw;">
        <div class="row">
            <div class="col s12" style="width: 30vw; margin: 0;">
                <h2 style="margin-block: 2rem; color:#4888ff;" >Login</h2>
                <div class="card" style="background: transparent !important;  box-shadow: 0px 0px 10px 10px #4888ff;">
                    <div class="card-content black-text">
                        @if ($mensagem = Session::get('erro'))
                            <span class="red-text">{{ $mensagem }}</span>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span class="red-text">{{ $error }}</span>
                            @endforeach
                        @endif

                        <form action="{{ route('login.auth') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-field">
                                <input id="email" type="email" name="email" class="validate" required>
                                <label for="email">E-mail</label>
                            </div>
                            
                            <div class="input-field">
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Senha</label>
                            </div>

                            <p>
                                <label>
                                    <input type="checkbox" name="remember" id="remember">
                                    <span>Lembrar-me</span>
                                </label>
                            </p>

                            <button class="btn waves-effect waves-light" type="submit">Entrar</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <p class="white-text">Não tem uma conta? <a class="blue-text" href="{{ route('login.create') }}">Criar conta</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
