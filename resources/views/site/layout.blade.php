<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @stack('style')
    <title>@yield('title')</title>
    
    <style>
        ul #dropdown1 li:hover,
        ul #dropdown2 li:hover{
            background: #382961;
        }
        ul #dropdown1 li a,
        ul #dropdown2 li a{
            color: #fff;
        }
        ul #dropdown1 li a:hover,
        ul #dropdown2 li a:hover{
            color: #4888ff;
        }
    </style>
</head>

<body style="background-color:#1d1f3a;">
    <!-- Dropdown Structure -->
    <ul id='dropdown1' style="background-color:#382961; border-radius:0 0 10px 10px;" class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{ route('site.categoria', $categoriaM->id) }}">{{ $categoriaM->nome }}</a></li>
        @endforeach
    </ul>

    <ul id='dropdown2' style="background-color:#382961; border-radius:0 0 10px 10px;" class='dropdown-content'>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}">Logout</a></li>
    </ul>
    <nav style="background-color:#382961; margin-bottom:1rem;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Curso Laravel</a>

            <ul id="nav-mobile" class="left">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="#" class="dropdown-trigger" data-target='dropdown1'>Categorias<i
                            class="material-icons right">expand_more</pre></i></a></li>
                <li><a href="{{ route('site.carrinho') }}">Carrinho <span style="border-radius: 50px" class="new badge blue"
                            data-badge-caption=''>{{ \Cart::getContent()->count() }}</span></a></li>
            </ul>
            @auth
                <ul id="nav-mobile" class="right">
                    <li><a href="#" class="dropdown-trigger" data-target='dropdown2'>Olá,
                            {{ auth()->user()->firstName }}<i class="material-icons right">expand_more</pre></i></a></li>
                </ul>
            @else
                <ul id="nav-mobile" class="right">
                    <li><a href="{{ route('login.index') }}">Login
                            <i class="material-icons right">login</pre></i></a></li>
                </ul>
            @endauth


        </div>
    </nav>

    @yield('conteudo')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>
</body>

</html>
