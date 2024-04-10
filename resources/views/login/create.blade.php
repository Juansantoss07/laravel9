@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="firstName">Primeiro nome:</label>
    <input type="text" name="firstName" required id="">

    <label for="lastName">Último nome:</label>
    <input type="text" name="lastName" required id="">

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>

    <label for="password">Senha:</label>
    <input type="password" name="password" required id="">


    <span>Imagem</span>
    <input name="imagem" type="file">


    <button type="submit">Cadastrar</button>
</form>
