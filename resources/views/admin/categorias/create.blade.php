<style>
    .modal-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-evenly;
    }
</style>
 <!-- Modal Structure -->
    <div id="create" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">card_giftcard</i>Nova categoria</h4>
            <form action="{{route('admin.categorias.store')}}" method="POST" enctype="multipart/form-data" class="col s12">
                @csrf

                <input type="hidden" name="id_user" value="{{auth()->user()->id}}">

                <div class="row">
                    <div class="input-field col s6">
                        <input name="nome" type="text" class="validate">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="descricao" type="text" class="validate">
                        <label for="descricao">Descrição</label>
                    </div>
                </div>

                <button type="submit" class="waves-effect waves-green btn blue right">Cadastrar</button><br>
        </div>

        </form>
    </div>
