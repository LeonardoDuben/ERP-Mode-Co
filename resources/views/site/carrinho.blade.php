@include('partials.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($user)
        <h2>
            @php $total = 0; @endphp
            @forelse ($carrinho as $item )
                <p>
                    {{ $item['nome'] }}  - {{ $item['quantidade'] }} x R$ {{ number_format($item['preco'], 2, ',', '.') }}
                </p>
                @php
                    $total += $item['preco'] * $item['quantidade'];
                @endphp
            @empty
                <p>Carrinho vazio.</p>
            @endforelse
            @if ($total > 0)
                <hr>
                <strong>Total: R$ {{ number_format($total,2,',','.') }}</strong>
            @endif
        </h2>
        <a href="/finalizar">Finalizar compra</a>
    @else
        <p>Você precisa estar logado para ver o carrinho.</p>
        <a href="{{ route('site.login') }}">Login</a>
    @endif
</body>
</html>
@include('partials.footer')