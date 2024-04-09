@extends('site.layout')
@section('title', 'Home')
@section('conteudo')

<style>
    .card:hover {
    box-shadow: 0px 10px 50px #4888ff;
    }
</style>

    <div class="row container">

        @foreach ($produtos as $produto)
            <div class="col s12 m3">
                <div style="min-width:362px; min-height:495px; border-radius: 10px; background-color:#382961; color:#fff;" class="card">
                    <div  class="card-image">
                        <img style="width:500px; height:362px; margin: 0 auto;" src="{{ url("storage/{$produto->imagem}") }}">

                        @can('ver-produtos', $produto)
                            <a href="{{ route('site.details', $produto->slug) }}"
                                class="btn-floating halfway-fab waves-effect waves-light blue"><i
                                    class="material-icons">visibility</i></a>
                        @endcan

                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ Str::limit($produto->nome, 20) }}</span>
                        <p>{{ Str::limit($produto->descricao, 50) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="center">
        @include('custom.pagination')
    </div>
@endsection
