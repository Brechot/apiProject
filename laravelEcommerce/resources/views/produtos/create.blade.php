@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Novo Produto</h1>

        {{-- Formulário de criação --}}
        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" required>
            </div>

            <button class="btn btn-success">Salvar</button>
        </form>

        <hr class="my-5">

        {{-- Listagem dos produtos --}}
        <h2 class="mb-3">Produtos Cadastrados</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th style="width: 180px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p['id'] }}</td>
                    <td>{{ $p['nome'] }}</td>
                    <td>R$ {{ number_format($p['preco'], 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $p['id']) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('produtos.destroy', $p['id']) }}"
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                Remover
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
