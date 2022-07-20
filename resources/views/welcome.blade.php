@extends('layouts.apps')
@section('title')
    Chamado: Deashboard
@endsection
@section('content')
<div class="container">
  <div class="row mt-4">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb- text-gray-800">Dashboard</h1>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Chamados Aberto (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Chamado::count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Chamados (meus atendimentos)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Agenda::where('user_id',Auth::user()->id)->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-handshake-o fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <!-- Mostra a porcentagem de chamados em atendimento referente a quantidade de chamados aberto -->
                                    {{(App\Models\Agenda::where('user_id',Auth::user()->id)->count() * 100)/(App\Models\Chamado::count())}}%
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pendentes de atendimentos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{(App\Models\Chamado::count())-(App\Models\Agenda::count())}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-clock-o fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Progresso dos serviços</h6>
            </div>
            @php
                $portfolios = App\Models\Portfolio::all();
                $chamados = App\Models\Chamado::all();
            @endphp
            <div class="card-body">
                @foreach ($portfolios as $portfolio)
                    @php
                        $progress = 0
                    @endphp
                <h4 class="small font-weight-bold">{{$portfolio->tipo}}
                    @foreach ($portfolio->servicos as $serv )
                        @php
                            $progress = $progress + (App\Models\Chamado::where('servico_id',$serv->id)->count())
                        @endphp
                    @endforeach
                    @if ($progress == 0)
                        <span class="float-right"> - 00%</span>
                    @else
                        <span class="float-right"> - {{$progress*100/(App\Models\Chamado::count())}}%</span>
                    @endif
                </h4>
                <div class="progress mb-4">
                <div @if ($progress*100/(App\Models\Chamado::count()) <= 24.9) class="progress-bar bg-danger" @elseif ($progress*100/(App\Models\Chamado::count()) <= 49.9) class="progress-bar bg-warning" @elseif ($progress*100/(App\Models\Chamado::count()) <= 74.9) class="progress-bar bg-info" @elseif ($progress*100/(App\Models\Chamado::count()) <= 100) class="progress-bar bg-success" @endif role="progressbar" style="width: {{$progress*100/(App\Models\Chamado::count())}}%"
                    aria-valuenow="{{$progress*100/(App\Models\Chamado::count())}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <!-- Color System -->
        <div class="row">

        </div>
    </div>

</div>

  </div>


@endsection
