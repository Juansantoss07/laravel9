  <style>
      .modal-content {
          display: flex;
          align-items: flex-start;
          justify-content: space-evenly;
      }
  </style>
  <!-- Modal Structure -->
  <div id="delete-{{ $usuario->id }}" class="modal">
      <div class="modal-content">
          <h4><i class="material-icons center">delete</i>Tem certeza que deseja excluir {{ $usuario->firstName }}
              {{ $usuario->lastName }}?</h4>

          <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a><br>

          <form action="{{ route('users.destroy', $usuario->id) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" class="waves-effect waves-green btn red right">Excluir</button><br>
          </form>
      </div>
  </div>
