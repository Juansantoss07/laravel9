<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function enviaPagamento(Request $request, String $produtos, String $quantidades){

        $produtosId = explode(',', $produtos);
        $quantidades = explode(',', $quantidades);
        
        $produtosComprados = Produto::find($produtosId);
        \Cart::clear();
        return redirect(route('site.index'))->with('sucesso', 'Compra realizada com sucesso');
    }
}
