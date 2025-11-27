<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    // URL do back-end em Spring Boot
    private $api = 'http://springapp:8080/api/produtos';


    public function index()
    {
        $response = Http::get($this->api . '/todos');
        $produtos = $response->json();

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $response = Http::get($this->api . '/todos');
        $produtos = $response->json();

        return view('produtos.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        Http::post($this->api, $request->all());
        return redirect()->route('produtos.create');
    }

    public function edit($id)
    {
        $response = Http::get($this->api . '/' . $id);
        $produto = $response->json();

        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        Http::put($this->api . '/' . $id, $request->all());
        return redirect()->route('produtos.create');
    }

    public function destroy($id)
    {
        Http::delete($this->api . '/' . $id);
        return redirect()->route('produtos.create');
    }

    public function addCarrinho($id)
    {
        $produto = Http::get($this->api . '/' . $id)->json();

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                'id' => $produto['id'],
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }

        session(['carrinho' => $carrinho]);

        return redirect()->back()->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    public function carrinho()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function removerCarrinho($id)
    {
        // pega o carrinho atual
        $carrinho = session()->get('carrinho', []);

        // se o produto existir no carrinho
        if (isset($carrinho[$id])) {

            // se tiver mais de 1, diminui quantidade
            if ($carrinho[$id]['quantidade'] > 1) {
                $carrinho[$id]['quantidade']--;

            } else {
                // se só tiver 1, remove do carrinho
                unset($carrinho[$id]);
            }

            // salva sessão atualizada
            session(['carrinho' => $carrinho]);
        }

        return redirect()->back()->with('sucesso', 'Produto removido do carrinho!');
    }


}
