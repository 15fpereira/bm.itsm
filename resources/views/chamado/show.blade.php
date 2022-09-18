@extends('layouts.apps')
@section('title')
    Chamado: {{$chamado->id}}
@endsection
@section('content')
<!-- Laço de repetição para pegar o ultimos loop do relacionamento caso aja mais de um -->
<!-- Loop Mostra o Ultimo tecnico que agendou -->
@foreach ($chamado::find($chamado->id)->agendas as $a)

@endforeach
<div class="container">

    <div class="row mt-4">
        @if(Session::has('flash_message'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-dismiss="alert"></button>
                <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Messagem de confirmação! </font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{Session::get('flash_message')}}</font></font><a href="#" class="alert-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    </font></font>
            </div>
        @endif
    </div>

    <div class="row bg-dark mt-4">
        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Detalhe
             </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">do chamado</font></font></small>
        </h4>
        <!-- Progresso utilizando operadores logicos -->
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" @if (@isset($a)) @if ($a->status == "Concluido") style="width: 100%;" @endif @if($a->status == "Concluido") style="width: 95%;" @endif @if($a->status == "Em andamento") style="width: 75%;" @endif @if($a->status == "Agendado") style="width: 50%;" @endif @endif  @if($chamado->status == "In loco" or $chamado->status == "Atendimento remoto")  style="width: 25%;" @endif></div>
        </div>

      <div class="col">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nº chamado:
            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->id}}</font></font></small>
            </li>
            <li class="list-group-item">Quantidade de agendamento:
            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{count($chamado->agendas)}}</font></font></small>
            </li>
            <li class="list-group-item">Situação:
            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->tipo}} - @isset($a) {{ $a->status }} @endisset @empty($a) Não definido @endempty</font></font></small>

            </li>
        </ul>

        </div>
      <div class="col">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Aberto por:
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($chamado->user_id)->name}}</font></font></small>

            </li>
            <li class="list-group-item"> Reponsável:
                @isset($a)
                    </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($a->user_id)->name}}</font></font></small>
                @endisset
                @empty($a)
                    </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não definido</font></font></small>
                @endempty
            </li>
        </ul>

        </div>
      <div class="col">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Serviço:
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ App\Models\Servico::find($chamado->servico_id)->nome }}</font></font></small>

            </li>
            <li class="list-group-item">Situação:
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->status}}</font></font></small>

            </li>
        </ul>

      </div>

    </div>
    <div class="row bg-dark mt-2">
      <div class="col mt-2">
        <h5>Nº chamado: {{$chamado->id}}</h5>
        @include('chamado.edit')
    </div>
      <div class="col mt-4">
        <h5>Tarefas Agendas:</h5>

        <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abertura</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atualização</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($chamado::find($chamado->id)->agendas as $agenda)
                    @include('agenda.edit')
                @endforeach
              </tbody>
        </table>

        @include('agenda.create')

      </div>
    </div>
  </div>


@endsection
