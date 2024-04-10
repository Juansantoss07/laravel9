@extends('site.layout')

@section('titulo', 'Checkout')

@section('conteudo')
    <div class="container white-text">

        <h3>Formulário de Pagamento</h3>
        <form action="{{ route('checkout.enviaPagamento', ['produtos' => implode(',', $produtosComprados), 'quantidades' => implode(',', $quantidades)]) }}" method="POST">
            @csrf

            <div class="input-field">
                <input type="email" id="email" name="email" class="validate white-text" required
                    @if (auth()->user()) value="{{ auth()->user()->email }}" @endif>
                <label for="email" class="white-text">Email</label>
            </div>
            <div class="input-field">
                <input type="text" id="address" name="address" class="validate white-text" required>
                <label for="address" class="white-text">Endereço</label>
            </div>
            <div class="input-field">
                <input type="text" id="district" name="district" class="validate white-text" required>
                <label for="district" class="white-text">Bairro</label>
            </div>
            <div class="input-field">
                <input type="text" id="city" name="city" class="validate white-text" required>
                <label for="city" class="white-text">Cidade</label>
            </div>
            <div class="input-field">
                <input type="text" id="state" name="state" class="validate white-text" required>
                <label for="state" class="white-text">Estado</label>
            </div>
            <div class="input-field">
                <input type="text" id="zip" name="zip" class="validate white-text" required>
                <label for="zip" class="white-text">CEP</label>
            </div>
            <p>
                <label>
                    <input name="paymentMethod" type="radio" value="pix" checked />
                    <span class="white-text">Pix</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="paymentMethod" type="radio" value="boleto" />
                    <span class="white-text">Boleto</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="paymentMethod" type="radio" value="cartao" />
                    <span class="white-text">Cartão de Crédito</span>
                </label>
            </p>
            <!-- Campo do cartão de crédito -->
            <div id="cardFields" style="display: none;">
                <div class="input-field">
                    <input type="text" id="cardNumber" name="cardNumber" class="validate white-text">
                    <label for="cardNumber" class="white-text">Número do Cartão</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="expiryMonth" name="expiryMonth" class="validate white-text">
                        <label for="expiryMonth" class="white-text">Mês de Validade</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="expiryYear" name="expiryYear" class="validate white-text">
                        <label for="expiryYear" class="white-text">Ano de Validade</label>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" id="cvv" name="cvv" class="validate white-text">
                    <label for="cvv" class="white-text">CVV</label>
                </div>
                <div class="input-field">
                    <input type="text" id="name" name="name" class="validate white-text">
                    <label for="name" class="white-text">Nome no Cartão</label>
                </div>
            </div>


            <button class="btn waves-effect waves-light" type="submit">Pagar</button>
        </form>
    </div>

    <!-- Adicione o link para o jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Adicione o link para o Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Mostrar ou ocultar o campo do cartão de crédito com base na opção selecionada
        $('input[name="paymentMethod"]').on('change', function() {
            if (this.value === 'cartao') {
                $('#cardFields').show();
                $('#cardFields input').prop('required', true); // Torna os campos do cartão obrigatórios
            } else {
                $('#cardFields').hide();
                $('#cardFields input').prop('required', false); // Remove a obrigatoriedade dos campos do cartão
            }
        });
    </script>
@endsection
