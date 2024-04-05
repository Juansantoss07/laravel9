@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

    <div class="row container">

        @if ($mensagem = Session::get('sucesso'))
            <div class="card green">
                <div class="card-content white-text">
                    <p>{{ $mensagem }}</p>
                </div>
            </div> 
    @endif

    @if ($mensagem = Session::get('aviso'))
    <div class="card blue">
        <div class="card-content white-text">
            <p>{{ $mensagem }}</p>
        </div>
    </div> 
@endif

    <h5>Seu carrinho possuí: {{ $itens->count() }} produtos.</h5>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <td><img src="{{ $item->attributes->image }}" width="70" class="responsive-img circle"></td>
                    <td>{{ $item->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                    <form action="{{ route('site.atualizaCarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <td><input class="white center" style="width: 40px; font-weight:900;" type="number" name="quantity"
                                value="{{ $item->quantity }}"></td>


                        <td>
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn-floating waves-effect waves-light orange"><i
                                    class="material-icons">refresh</i></button>
                    </form>

                    <form action="{{ route('site.removeCarrinho') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button class="btn-floating waves-effect waves-light red"><i
                                class="material-icons">delete</i></button>
                    </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row container center">
        <button class="btn waves-effect waves-light blue">Continuar comprando<i
                class="material-icons right">arrow_back</i></button>
        <a href="{{route('site.limpaCarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
        <button class="btn waves-effect waves-light green">Finalizar pedido<i
                class="material-icons right">check</i></button>
    </div>
    </div>


@endsection
