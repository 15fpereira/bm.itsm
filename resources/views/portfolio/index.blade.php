@extends('layouts.apps')
@section('title')
    {{__('Portfolio de serviço de TI')}}
@endsection
@section('content')


<div class="album text-muted">
    <div class="container">

        <div class="row mt-4">
            <h3>Portfólio de serviços de TI</h3>
            <p class="lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Deseja criar um novo portfólio?</font></font>
                <a class="btn btn-link" href="#">Click aqui!</a>
            </p>
        </div>
        <div class="row">
            <!-- card -->
            @foreach ($portfolios as $portfolio)
            <div class="col-xs-4 col-md-4 mt-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->tipo}}</font></font></h4>
                        <h6 class="card-subtitle mb-2 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->tipo}}</font></font></h6>
                        <i class="fa fa-envelope-o fa-x5"></i>
                        <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->objetivo}}&nbsp;{{$portfolio->descricao}}</font></font></p>
                        <a href="{{route('servicos.create')}}" class="card-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Novo Serviço </font></font></a>
                        @include('servico.create')
                        <a href="{{route('portfolios.show',$portfolio)}}" class="card-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviços</font></font></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- end card -->
        </div>
        <div class="row mt-4">

        </div>

    </div>
</div>



    <div class="container text-center">
        <div class="list-group">

        </div>




        <p class="lead text-muted"> {{__('Hello!' )}} Seja bem vido ao {{__('Dashboard')}} do sistema: Bm.itsm {{Auth::user()->name}}</p>

        <p>

            <a href="#" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Meus chamados</a>

            <a href="#" class="btn btn-secondary"><i class="fa fa-list"></i>&nbsp; Todos os chamados</a>

        </p>

    </div>


@endsection
