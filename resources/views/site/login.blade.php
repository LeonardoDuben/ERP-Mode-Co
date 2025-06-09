@include('partials.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        @if($errors->any())
            <div style="color:red;">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('site.login.submit') }}" method="POST">
            @csrf
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

@include('partials.footer')