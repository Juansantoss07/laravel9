@extends('admin.layout')

@section('titulo', 'Categorias')
@section('conteudo')

    @include('admin.categorias.create')


    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <div class="row container crud">

        @include('includes.mensagem')

        <div class="row titulo ">
            <h1 class="left">Categorias</h1>
            <span class="right chip">{{ $categorias->count() }} categorias na página</span>
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
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                @foreach ($categorias as $categoria)
                    <tbody>
                        <tr>
                            <td></td>
                            <td>#{{ $categoria->id }}</td>
                            <td>{{ $categoria->nome }}</td>
                            <td>
                                <a href="#edit-{{$categoria->id}}"
                                    class="btn-floating modal-trigger waves-effect waves-light orange"><i
                                        class="material-icons">mode_edit</i></a>
                                @include('admin.categorias.edit')
                                <a href="#delete-{{ $categoria->id }}"
                                    class="btn-floating modal-trigger waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                                @include('admin.categorias.delete')
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="center">
        @include('custom.paginationCategorias')
    </div>
@endsection
