<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $usuarios = User::all()->count();
        // gráfico 1 - usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();

        // preparar arrays
        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // formatar para o chartjs
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);


        // gráfico 2 - categorias

        $catData = Categoria::with('produtos')->get();

        //preparar array
        foreach ($catData as $cat) {
            $catNome[] = "'.$cat->nome.'";
            $catTotal[] = $cat->produtos->count();
        }

        //formatar para chartjs
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        try{
            Gate::authorize('admin', $usuarios);
        }catch(AuthorizationException $e){
            return redirect(route('site.index'));
        }

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
