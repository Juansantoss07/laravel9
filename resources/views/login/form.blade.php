@if ($mensagem = Session::get('erro'))
    {{$mensagem}}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif

<form action="{{route('login.auth')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="email">E-mail:</label>
    <input type="email" name="email" required>
    
    <label for="password">Senha:</label>
    <input type="password" name="password" required id="">

    <input type="checkbox" name="remember" id="">Lembrar-me

    <button type="submit">Entrar</button>
</form>