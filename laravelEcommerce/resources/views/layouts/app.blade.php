<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myshop - Ecommerce</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

<nav class="navbar navbar-light navbar-expand-md bg-light ps-5 pe-5 mb-5">
    <a href="#" class="navbar-brand">Myshop</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <div class="navbar-nav">
            <a href="{{route('produtos.index')}}" class="nav-link">Home</a>
            <a href="{{ route('produtos.create') }}" class="nav-link">Cadastrar Produto</a>
        </div>
    </div>

    <a href="{{ route('carrinho.index') }}" class="btn btn-sm">
        <i class="fa fa-shopping-cart"></i>
    </a>

</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
