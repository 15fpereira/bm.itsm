<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        dd($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       //dd($request->all());
        Agenda::create($request->all());
        Session::flash('flash_message', 'Nova tarefa agendada com sucesso! '); //messagem de sucesso!
        return redirect()->route('chamados.show',$request->chamado_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateagendaRequest  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
        //dd($request->all());
        //dd($agenda->observacao);
        $agenda->observacao = $request->observacao;
        $agenda->descricao = $request->descricao;
        $agenda->status = $request->status;
        $agenda->save();
        Session::flash('flash_message', 'Tarefa agendada altera com sucesso! '); //messagem de sucesso!
        return redirect()->route('chamados.show',[$agenda->chamado_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
