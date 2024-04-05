<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->image
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso');
    }

    public function removeCarrinho(Request $req)
    {
        \Cart::remove($req->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido no carrinho com sucesso');
    }

    public function atualizaCarrinho(Request $req)
    {
        \Cart::update($req->id, [
            'quantity' => [
                'relative' => false,
                'value' => $req->quantity
            ]
            ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado no carrinho com sucesso');
    }

    public function limpaCarrinho()
    {
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');
    }
}
