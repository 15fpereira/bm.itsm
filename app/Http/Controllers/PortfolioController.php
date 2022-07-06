<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Lista ordenada pelo nome : https://laravel.com/docs/8.x/eloquent#retrieving-models
        //$contatos = Contato::orderBy("name")->get();
        $portfolios = Portfolio::all();
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servico.create');
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
        //dd($request->all());
        Portfolio::create($request->all());
        return redirect()->route('portfolios.index');
              // Chamado::create($request->all());
              // return redirect()->route('painel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portifolio  $portifolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
        return view('portfolio.show',['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portifolio  $portifolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portifolio  $portifolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portifolio  $portifolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
