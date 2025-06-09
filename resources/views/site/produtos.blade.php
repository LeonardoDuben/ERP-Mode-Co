@include('partials.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    @if ($user)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preco</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto )
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('site.carrinho_adicionar') }}" method="post">
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <input type="hidden" name="nome" value="{{ $produto->nome }}">
                                <input type="hidden" name="preco" value="{{ $produto->preco }}">
                                <input type="hidden" name="quantidade" value="1">
                                <button type="submit">Adicionar ao carrinho</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você precisa estar logado para ver os produtos.</p>
        <a href="{{ route('site.login') }}">Login</a>
    @endif
</body>
</html>

@include('partials.footer')