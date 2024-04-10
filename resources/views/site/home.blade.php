@extends('site.layout')
@section('title', 'Home')
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
        @include('includes.mensagem')
        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div style=" border-radius: 10px; background-color:#382961; color:#fff;"
                    class="card">
                    <div class="card-image">
                        <img class="responsive-img" style="width:auto; max-height:300px; margin: 0 auto;" src="{{ url("storage/{$produto->imagem}") }}">

                        {{-- @can('ver-produtos', $produto) --}}
                        <a href="{{ route('site.details', $produto->slug) }}"
                            class="btn-floating halfway-fab waves-effect waves-light blue"><i
                                class="material-icons">visibility</i></a>
                        {{-- @endcan --}}

                        <form action="{{ route('site.addCarrinho', $produto->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produto->id }}">
                            <input type="hidden" name="name" value="{{ $produto->nome }}">
                            <input type="hidden" name="price" value="{{ $produto->preco }}">
                            <input type="hidden" name="qnt" value="1" min="1">
                            <input type="hidden" name="image" value="{{ $produto->imagem }}">
                            <button type="submit" class="btn-floating halfway-fab waves-effect waves-light blue"
                                style="margin-right:3.5rem"><i class="material-icons">local_grocery_store</i></button>
                        </form>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ Str::limit($produto->nome, 20) }}</span>
                        <p>{{ Str::limit($produto->descricao, 35) }}</p>
                        <span style="font-size: 20px; color:greenyellow;">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
