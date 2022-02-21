@extends('layouts.app')
@section('title')
    Chamado: {{$chamado->id}}
@endsection
@section('content')
<div class="container">

    <div class="row bg-outline-secondary">
      <div class="col">Nº chamado: {{$chamado->id}}</div>
      <div class="col">

        <ul>
            <li>Responsável: Francisco Dias</li>
            <li>Situação: {{$chamado->status}}</li>
        </ul>


        </div>
      <div class="col">col</div>
      <div class="col">col</div>
    </div>
    <div class="row bg-dark">
      <div class="col"><h5>Nº chamado: {{$chamado->id}}</h5>
        @include('chamado.edit')
    </div>
      <div class="col">
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
