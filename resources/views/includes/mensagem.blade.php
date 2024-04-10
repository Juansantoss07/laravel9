@if ($mensagem = Session::get('sucesso'))
<div class="card" style="border-radius: 6px; background-color:greenyellow" id="mensagem">
    <div class="card-content white-text">
        <p style="color: #222">{{ $mensagem }}</p>
    </div>
</div>
@endif

<script>
    // Verifica se a mensagem está presente na página
    document.addEventListener('DOMContentLoaded', function() {
        if(document.getElementById('mensagem')) {
            var mensagemElement = document.getElementById('mensagem');
            
            setTimeout(function() {
                fadeOut(mensagemElement);
            }, 5000); 
        }
    });

    function fadeOut(element) {
        var opacity = 1;
        var intervalId = setInterval(function() {
            if (opacity > 0) {
                opacity -= 0.05; 
                element.style.opacity = opacity;
            } else {
                clearInterval(intervalId); 
                element.parentNode.removeChild(element); 
            }
        }, 100); 
    }
</script>