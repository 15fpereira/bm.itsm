<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    // Construtor para torna a classe: ChamadoController acessivel internamente,
    // ou seja, quando estiver autenticado.
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chamados = Chamado::all();
        return view('chamado.index', compact('chamados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());
        Chamado::create($request->all());
        return redirect()->route('painel');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        //
        return view('chamado.show',['chamado' => $chamado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        // Utilizando modal
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        //
       // dd($request->all());

       // $contato = Contato::find($id);
       //dd($chamado);
        $chamado->descricao = $request->descricao;
        $chamado->status = $request->status;
        $chamado->save();

       // $contato->name = $request->name;
      //  $contato->telefone = $request->telefone;
      //  $contato->email = $request->email;
      //  $contato->save();
     //   Session::flash('flash_message', 'Contatos Atualizado com sucesso!');
        foreach($chamado->servicos() as $chmd)
        {
            dd($chmd);
        };
        if($chamado->status == "Concluido" )
        {
            return redirect()->route('chamados.index');
        }else
        {
            return redirect()->route('chamados.show',[$chamado]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado)
    {
        //
    }
}
