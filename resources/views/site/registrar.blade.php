@include('partials.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
</head>
<body>

    @if ($user)
        <p>Olá, {{ $user->name }}</p>
    @endif
    <div class="register-container">
        <h2>Registrar</h2>
        @if($errors->any())
            <div style="color:red;">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('site.registrar.submit') }}" method="POST">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" required>
            <br>
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" name="password" required>
            <br>
            <label for="password_confirmation">Confirmação de Senha:</label>
            <input type="password" name="password_confirmation" required>
            <br>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
@include('partials.footer')