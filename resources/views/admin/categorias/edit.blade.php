<style>
    .modal-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-evenly;
    }
</style>
<!-- Modal Structure -->
<div id="edit-{{$categoria->id}}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">card_giftcard</i>Editar categoria</h4>
        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="post" class="col s12">
            @method('PUT')
            @csrf
            <input type="hidden" name="id_categoria" value="{{$categoria->id}}">

            <div class="row">
                <div class="input-field col s6">
                    <input name="nome" type="text" class="validate" value="{{$categoria->nome}}">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input name="descricao" type="text" class="validate" value="{{$categoria->descricao}}">
                    <label for="descricao">Descrição</label>
                </div>
            </div>

            <button type="submit" class="waves-effect waves-green btn blue right">Atualizar</button>
        </form>
    </div>
</div>
