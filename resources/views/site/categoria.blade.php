@extends('site.layout')
@section('title', 'Categoria')
@section('conteudo')
<style>
    .card:hover {
        box-shadow: 0px 0px 10px 5px #4888ff;
    }

    .card:hover .card-image img {
        transform: scale(1.1);
        transition: .5s;
    }
</style>

    <div class="row container">

        <h5 style="color: #fff; font-size: 16px; margin-left:1rem;">Categoria: {{$categoria->nome}}</h5>

        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div style="border-radius: 10px; background-color:#382961; color:#fff;"class="card">
                    <div class="card-image">
                        <img style="width:auto; max-height:300px; margin: 0 auto;" src="{{ url("storage/{$produto->imagem}")}}">
                        <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light blue"><i
                                class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{Str::limit($produto->nome, 20)}}</span>
                        <p>{{Str::limit($produto->descricao, 50)}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
