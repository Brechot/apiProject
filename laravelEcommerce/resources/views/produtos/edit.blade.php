@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Produto</h1>

        <form method="POST" action="{{ route('produtos.update', $produto['id']) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" value="{{ $produto['nome'] }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" value="{{ $produto['preco'] }}" class="form-control">
            </div>

            <button class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
