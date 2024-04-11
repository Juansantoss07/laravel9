<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
                <h2 style="margin-block: 2rem; color:#4888ff;" >Cadastre-se</h2>
                <div class="card" style="background: transparent !important;  box-shadow: 0px 0px 10px 10px #4888ff;">
                    <div class="card-content black-text">
                        @if ($errors->any())
                            <div class="red-text">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input-field">
                                <input id="firstName" type="text" name="firstName" class="validate" required>
                                <label for="firstName">Primeiro nome</label>
                            </div>

                            <div class="input-field">
                                <input id="lastName" type="text" name="lastName" class="validate" required>
                                <label for="lastName">Último nome</label>
                            </div>

                            <div class="input-field">
                                <input id="email" type="email" name="email" class="validate" required>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="input-field">
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Senha</label>
                            </div>

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Imagem</span>
                                    <input name="imagem" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light" type="submit">Cadastrar</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <p class="white-text">Já tem uma conta? <a class="blue-text" href="{{ route('login.index') }}">Fazer login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
