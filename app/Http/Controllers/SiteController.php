<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('nome', 'asc')->get(); // O método paginate() traz todos os registros e define quantos serão exibidos por página.
        return view('site.home', compact('produtos'));
    }

    public function details($slug)
    {
        $produto = Produto::where('slug', $slug)->first(); // O método first() traz somente um registro
        
        // Gate::authorize('ver-produtos', $produto);
        return view('site.details', compact('produto'));
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(3); // O método get() busca os registros com a condição, diferente do all() que busca todos os registros.Mas optamos por usar o paginate() que vai trazer os dados que queremos definindo o numero que queremos que exiba por página;.
        return view('site.categoria', compact('produtos', 'categoria'));
    }

    public function checkout()
    {
        return view('site.checkout');
    }
}
