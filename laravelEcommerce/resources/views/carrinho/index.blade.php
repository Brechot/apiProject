@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Carrinho</h1>

    @if (count($carrinho) === 0)
        <div class="alert alert-info">Seu carrinho está vazio.</div>
    @else
        <div class="row">

            @foreach ($carrinho as $item)
                <div class="col-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset('img/produto.png') }}" class="card-img-top">

                        <div class="card-body">
                            <h5>{{ $item['nome'] }}</h5>
                            <p><strong>Preço:</strong> R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                            <p><strong>Qtd:</strong> {{ $item['quantidade'] }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">

                            <a href="{{ route('carrinho.adicionar', $item['id']) }}" class="btn btn-sm btn-success">
                                +1
                            </a>

                            <a href="{{ route('carrinho.remover', $item['id']) }}"
                               class="btn btn-danger btn-sm">
                                Remover
                            </a>


                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    @endif

@endsection
