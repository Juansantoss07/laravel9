@extends('admin.layout')
@section('titulo', 'Produtos')

@section('conteudo')


    <div class="row container crud">

        @include('includes.mensagem')

        <div class="row titulo ">
            <h1 class="left">Usuários</h1>
            <span class="right chip">{{ $usuarios->count() }} usuarios na página</span>
        </div>

        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                        <input placeholder="Pesquisar..." id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>

        <div class="card z-depth-4 registros">
            <table class="striped ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th></th>
                        <th>Primeiro nome</th>
                        <th>Segundo nome</th>
                        <th>Email</th>

                    </tr>
                </thead>

                @foreach ($usuarios as $usuario)
                    <tbody>
                        <tr>
                            <td><img src="{{ url("storage/{$usuario->imagem}") }}" class="circle "></td>
                            <td>#{{ $usuario->id }}</td>
                            <td></td>
                            <td>{{ $usuario->firstName }}</td>
                            <td>{{ $usuario->lastName }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td><a href="#edit-{{ $usuario->id }}"
                                    class="btn-floating modal-trigger waves-effect waves-light orange"><i
                                        class="material-icons">mode_edit</i></a>
                                @include('admin.usuarios.edit')
                                <a href="#delete-{{ $usuario->id }}"
                                    class="btn-floating modal-trigger waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                                @include('admin.usuarios.delete')
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>



@endsection
