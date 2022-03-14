@extends('layouts.apps')
@section('title')
    {{__('Painel')}}
@endsection
@section('content')
<section class="jumbotron text-center mt-4">

    <div class="container">
        <div class="row mt-4">
            <i class="fa fa-desktop fa-8x mt-4" aria-hidden="true"></i>&nbsp;
            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                {{__('bm.')}}
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('itsm')}}</font></font></small>
            </h1>


            <p class="lead text-muted"> {{__('Hello!' )}} Seja bem vindo ao {{__('Dashboard')}} do sistema: Bm.itsm {{Auth::user()->name}}</p>

            <p>
                <a href="{{route('portfolios.index')}}" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-list"></i>&nbsp; Portfólido de serviços de TI</font></font></a>
                <a href="/meuschamados" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Meus chamados</a>

                <a href="{{route('chamados.index')}}" class="btn btn-secondary"><i class="fa fa-list"></i>&nbsp; Todos os chamados</a>

            </p>
        </div>
        </div>

</section>
@endsection
