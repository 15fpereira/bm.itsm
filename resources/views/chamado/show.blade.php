@extends('layouts.apps')
@section('title')
    Chamado: {{$chamado->id}}
@endsection
@section('content')
<div class="container">
    <div class="row bg-dark mt-2">
        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Detalhe
             </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">do chamado</font></font></small>
        </h4>

      <div class="col">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nº chamado:
            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->id}}</font></font></small>
            </li>
            <li class="list-group-item">Quantidade de agendamento:
            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{count($chamado->agendas)}}</font></font></small>
            </li>
        </ul>

        </div>
      <div class="col">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Responsável:
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($chamado->user_id)->name}}</font></font></small>

            </li>
            <li class="list-group-item">Situação:
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->status}}</font></font></small>

            </li>
        </ul>

        </div>
      <div class="col">Serviço:</div>
      <div class="col">col</div>
    </div>
    <div class="row bg-dark mt-2">
      <div class="col mt-2">
        <h5>Nº chamado: {{$chamado->id}}</h5>
        @include('chamado.edit')
    </div>
      <div class="col mt-4">
        <h5>Agenda do chamado:</h5>

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
