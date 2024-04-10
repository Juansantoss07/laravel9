<style>
    .modal-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-evenly;
    }
</style>

  <!-- Modal Structure -->
    <div id="edit-{{$usuario->id}}" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">card_giftcard</i>Editar usuário</h4>
            <form action="{{route('users.update', $usuario->id)}}" method="post" enctype="multipart/form-data" class="col s12">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <input name="firstName" type="text" class="validate" value="{{$usuario->firstName}}">
                        <label for="firstName">Primeiro nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="lastName" type="text" class="validate" value="{{$usuario->lastName}}">
                        <label for="lastName">Segundo nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="email" type="email" class="validate" value="{{$usuario->email}}">
                        <label for="email">Email</label>
                    </div>

                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>Nova Imagem</span>
                            <input name="imagem" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <button type="submit" class="waves-effect waves-green btn blue right">Atualizar</button><br>
        </div>

        </form>
    </div>
