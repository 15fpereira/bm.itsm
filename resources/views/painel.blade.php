@extends('layouts.apps')
@section('title')
    {{__('Painel')}}
@endsection
@section('content')

<section class="jumbotron text-center mt-4">

    <div class="container">

        <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            {{__('bm.')}}
             </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('itsm')}}</font></font></small>
        </h1>


        <p class="lead text-muted"> {{__('Hello!' )}} {{Auth::user()->name}} Seja bem vido ao {{__('Dashboard')}} do sistema: Bm.itsm</p>

        <p>

            <a href="#" class="btn btn-primary">Meus chamados</a>

            <a href="#" class="btn btn-secondary">Todos os chamados</a>

        </p>

    </div>

</section>
@endsection
