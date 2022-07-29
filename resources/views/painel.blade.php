@extends('layouts.apps')
@section('title')
    {{__('Painel')}}
@endsection
@section('content')
<section class="jumbotron text-center mt-4">

    <div class="container">

        <div class="row mt-4">
            @if(Session::has('flash_message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-dismiss="alert"></button>
                    <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Messagem de confirmação! </font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{Session::get('flash_message')}}</font></font><a href="/meuschamados" class="alert-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Acessar meus chamdos?</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        </font></font>
                </div>
            @endif
        </div>

        <div class="row mt-4">
            <i class="fa fa-desktop fa-8x mt-4" aria-hidden="true"></i>&nbsp;
            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                {{__('bm.')}}
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('itsm')}}</font></font></small>
            </h1>


            <p class="lead text-muted"> {{__('Hello!' )}} Seja bem vindo ao {{__('Dashboard')}} do sistema: Bm.itsm {{Auth::user()->name}}</p>

            <p>
                <a href="{{route('portfolios.index')}}" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-list"></i>&nbsp; Portfólido de serviços de TI</font></font></a>
                <!-- Somente usuário padrao -->
                @if (Auth::user()->status != 'adm')
                    <a href="/meuschamados" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Meus chamados</a>
                @endif
                <!-- Somente administrador -->
                @if (Auth::user()->status == 'adm')
                    <a href="{{route('chamados.index')}}" class="btn btn-secondary"><i class="fa fa-list"></i>&nbsp; Todos os chamados</a>
                @endif

            </p>
        </div>
        <div class="row mt-4">
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Painel de controle
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> site.</font></font></small>
            </h4>
        </div>
        <div class="row mt-4">
            <div class="col-xs-6 col-md-4">
                <div class="card text-center fa-4x">
                    <div class="card-body">
                       <i class="fa fa-cogs"></i>
                      <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Configurações</font></font></h4>
                      <h6 class="card-subtitle mb-2 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Legenda do cartão</font></font></h6>
                    </div>
                  </div>

            </div>
            <div class="col-xs-6 col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-users fa-4x"></i>
                      <h4 class="card-title md-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuários</font></font></h4>
                      <h6 class="card-subtitle mb-2 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gestão de usuários</font></font></h6>

                   </div>
                  </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                    <i class="fa fa-server fa-4x"></i>
                      <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Título do cartão</font></font></h4>
                      <h6 class="card-subtitle mb-2 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Legenda do cartão</font></font></h6>
                    </div>
                </div>
            </div>

        </div>


    </div>


</section>
@endsection
