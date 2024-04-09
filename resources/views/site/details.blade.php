@extends('site.layout')
@section('title', 'Detalhes do produto')
@section('conteudo')
<div class="row container" style="color: #fff"> <br>
    <div class="col s12 m6">
        <img style="width:500px; height:500px;" src="{{ url("storage/{$produto->imagem}")}}" class="responsive-img">
    </div>

    <div class="col s12 m6">
        <h4>{{$produto->nome}}</h4>
        <h4>R$ {{number_format($produto->preco, 2, ',', '.')}}</h4>
        <p>{{$produto->descricao}}</p>
        <p>Postado por: {{$produto->user->firstName}}</p>
        <p>Categoria: {{$produto->categoria->nome}}</p>
        
        <form action="{{route('site.addCarrinho')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->nome}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input style="color: #fff;" type="number" name="qnt" value="1" min="1">
            <input type="hidden" name="image" value="{{$produto->imagem}}">
            <button style="border-radius: 20px" class="btn green btn-large">Comprar</button>
        </form>
        
    </div>
</div>

@endsection