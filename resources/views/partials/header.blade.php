<header class="header">
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <!-- filepath: /home/leo/projetos/sistema-cupom/resources/views/partials/header.blade.php -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    </head>
    <img
        src="img/logo.png"
        class="logo"
        alt="Logo Mode&Co"
    />
    <a href="/login">
        @if ($user)
            <form action="{{ route('site.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button class ="sair-user" type="submit">Sair</button>
            </form>
        @endif
        <i class="fa-solid fa-circle-user user"></i>
    </a>
       <div class="linha dupla">
        <div class="linha"></div>
        <div class="linha"></div>
    </div>
    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="{{ route('site.principal') }}">Início</a></li>
            <li><a href="{{ route('site.produtos') }}">Produtos</a></li>
            <li><a href="{{ route('site.carrinho') }}">Carrinho</a></li>
            <li><a href="{{ route('site.registrar') }}">Registrar</a></li>
        </ul>
    </nav>

    <h1 class="logo-text">Mode&Co styles</h1>
    
</header>