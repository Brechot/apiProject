@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Produtos</h1>

    <div class="row">
        @foreach ($produtos as $p)
            <div class="col-3 mb-3">
                <div class="card h-100">

                    <!-- Imagem padrão -->
                    <img src="{{ asset('img/produto.png') }}" class="card-img-top" alt="Produto">

                    <div class="card-body">
                        <h5 class="card-title">{{ $p['nome'] }}</h5>
                        <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($p['preco'], 2, ',', '.') }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a class="btn btn-primary btn-sm" href="{{ route('carrinho.adicionar', $p['id']) }}">
                            <i class="fa fa-cart-plus"> carrinho</i>
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
