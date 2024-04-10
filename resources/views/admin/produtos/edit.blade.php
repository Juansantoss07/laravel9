<style>
    .modal-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-evenly;
    }
</style>
   
   <!-- Modal Structure -->
    <div id="edit-{{$produto->id}}" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">card_giftcard</i>Editar produto</h4>
            <form action="{{route('admin.produtos.update', $produto->id)}}" method="post" enctype="multipart/form-data" class="col s12">
                @method('PUT')
                @csrf   
                <input type="hidden" name="id" value="{{$produto->id}}">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="nome" type="text" class="validate" value="{{$produto->nome}}">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="preco" type="number" class="validate" value="{{$produto->preco}}">
                        <label for="preco">Preço</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="descricao" type="text" class="validate" value="{{$produto->descricao}}">
                        <label for="descricao">Descrição</label>
                    </div>

                    <div class="input-field col s12">
                        <select name="id_categoria">
                            <option value="{{$produto->categoria->id}}" selected>{{$produto->categoria->nome}}</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                        <label>Categorias</label>
                    </div>

                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>Nova Imagem</span>
                            <input name="imagem" type="file">
                        </div>
                    </div>
                </div>

                <button type="submit" class="waves-effect waves-green btn blue right">Atualizar</button><br>
        </div>

        </form>
    </div>
