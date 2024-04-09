@if ($mensagem = Session::get('sucesso'))
<div class="card green" style="border-radius: 20px;">
    <div class="card-content white-text">
        <p>{{ $mensagem }}</p>
    </div>
</div>
@endif