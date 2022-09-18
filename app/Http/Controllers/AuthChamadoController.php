<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Servico;

class AuthChamadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Aqui só mostra a lista de chamado do usuário autenticado.
        $chamados = Chamado::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();//find(Auth::user()->id);
       // dd($chamados);
        return view('chamado.auth.index', compact('chamados'));
    }

    public function create()
    {
        // Utilizando modal
    }

    public function store(Request $request)
    {
        //
        //dd($request->all())
        Chamado::create($request->all());
        Session::flash('flash_message', 'Novo chamado criado com sucesso! '); //messagem de sucesso!
        return redirect()->route('painel');


    }

    public function getselect($id)
    {

        return Servico::where('portfolio_id', $id)->get();

    }
}
