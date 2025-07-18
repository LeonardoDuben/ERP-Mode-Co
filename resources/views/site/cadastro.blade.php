@include('partials.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de produtos</title>
</head>
<body>
    <h1>Cadastrar produtos</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;"></div>
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    @if ($user)
        <form action="{{ route('site.cadastro') }}" method="post">
            @csrf
            <label for="nome">Nome do produto:</label><br>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}"><br><br>

            <label for="preco">Preço do produto:</label><br>
            <input type="text" name="preco" id="preco" value="{{ old('preco') }}"><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    @else
        <p>Você precisa estar logado para cadastrar produtos.</p>
        <a href="{{ route('site.login') }}"><button>Login</button></a>
    @endif
</body>
</html>
@include('partials.footer')