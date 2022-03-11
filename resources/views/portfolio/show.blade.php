@extends('layouts.apps')
@section('title')
    Lista de serviços de TI
@endsection
@section('content')
@php
    $i = 0
@endphp
        <div class="container">
            <div class="row">
                <h3>Detalhe do portifolio de serviços de TI</h3>
                 <p class="lead"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clique aqui para adicionar um novo serviço:</font></font>
                    <a class="btn btn-link" href="{{route('servicos.create')}}">Click aqui!</a>
                </p>
            </div>
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Tipo:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->tipo}}</font></font></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Quantidade de serviços registrado:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{count($portfolio->servicos)}}</font></font></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Data/hora de abertura:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->created_at->format('d-m-Y H:i:s')}}</font></font></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Portfolio de serviço:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->status}}</font></font></span>
                    </li>
                </ul>
            </div>

            <div class="row">

                    @foreach ($portfolio->servicos as $port )

                        <div class="col-xs-4 col-md-4 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$port->nome}}</font></font></h4>
                                    <h6 class="card-subtitle text-center mb-2 text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->tipo}}</font></font></h6>
                                    <p class="text-center "><i class="fa fa-envelope-o fa-x5"></i></p>
                                    <p class="card-text text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;{{$port->descricao}}</font></font></p>
                                    @include('chamado.create')
                                    <a href="{{route('portfolios.show',$portfolio)}}" class="card-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviços</font></font></a>

                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
@endsection
