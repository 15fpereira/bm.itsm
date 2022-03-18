@extends('layouts.apps')
@section('title')
    {{__('Todos os chamados')}}
@endsection
@section('content')
<div class="container">
    <div class="row mt-4">
        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Todos
             </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">chamados abertos</font></font></small>
        </h4>
    </div>
    <div class="row bg-dark mt-2">

    </div>
    <div class="col mt-4">

        <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Responsável</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviço</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dt de criação</font></font></th>
                  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">abrir</font></font></th>

                </tr>
              </thead>

              <tbody>
                @foreach ($chamados as $chamado)
                <tr class="table-active">
                    <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->id}}</font></font></th>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($chamado->user_id)->name}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->status}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\Servico::find($chamado->servico_id)->nome}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->created_at}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('chamados.show',$chamado)}}"><i class="fa fa-level-up" aria-hidden="true"></i></a></font></font></td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </div>
  </div>
@endsection
