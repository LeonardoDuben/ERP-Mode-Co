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
    <h1>Finalizar Compra</h1>

    <p><strong>Estado:</strong> {{ $estado }}</p>
    <p><strong>Frete:</strong> R$ {{ number_format($frete, 2, ',', '.') }}</p>
    <p><strong>Total dos Produtos:</strong> R$ {{ number_format($totalProdutos, 2, ',', '.') }}</p>
    <hr>
    <p><strong>Total Final com Frete:</strong> R$ {{ number_format($totalFinal, 2, ',', '.') }}</p>
</body>
</html>

@include('partials.footer')