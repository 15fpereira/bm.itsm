<?php

use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Support\Facades\Auth;

class AuthChamadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Aqui só mostra a lista de chamado do usuário autenticado.
        $chamados = Chamado::where('user_id', Auth::user()->id)->get();//find(Auth::user()->id);
       // dd($chamados);
        return view('chamado.auth.index', compact('chamados'));
    }

}
