@include('partials.header')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
</head>
<body>
    <h1>Finalizar Compra</h1>

    @if ($user)
        <div class="finalizar-container">
            <h2>Insira o seu CEP</h2>
            <form action="{{ route('site.finalizar.submit') }}" method="POST">
                @csrf

                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" required>

                <label for="rua">Rua:</label>
                <input type="text" name="rua" id="rua" readonly>

                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" readonly>

                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" readonly>

                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" readonly>

                <button type="submit">Finalizar</button>
            </form>
        </div>

        <script>
            document.getElementById('cep').addEventListener('blur', function () {
                let cep = this.value.replace(/\D/g, '');
                if (cep.length !== 8) return;

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.erro) {
                            alert('CEP não encontrado!');
                            return;
                        }

                        document.getElementById('rua').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                        document.getElementById('estado').value = data.uf || '';
                    })
                    .catch(() => {
                        alert('Erro ao buscar o CEP.');
                    });
            });
        </script>
    @else
        <p>Você precisa estar logado para finalizar a compra.</p>
        <a href="{{ route('site.login') }}">Login</a>
    @endif

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>


@include('partials.footer')