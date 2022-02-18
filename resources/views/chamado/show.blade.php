@extends('layouts.app')
@section('title')
    Chamado: {{$chamado->id}}
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col">col Nº chamado: {{$chamado->id}}</div>
      <div class="col">col</div>
      <div class="col">col</div>
      <div class="col">col</div>
    </div>
    <div class="row">
      <div class="col-8">col-8$ {{$chamado->descricao}}
        @include('chamado.edit')
    </div>
      <div class="col-4">
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
                    <tr class="table-dark">

                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$agenda->created_at}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$agenda->updated_at}}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font>{{$agenda->status}}</font></td>
                    </tr>
                @endforeach
              </tbody>
            </table>




        @include('agenda.create')
        <a class="btn btn-outline-light" href="{{route('agendas.create',$chamado->id)}}"><font style="button"><font style="vertical-align: inherit;">Nova Agenda</font></font></a>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
        //Add a minus icon to the collapse element that is open by default
        $('.collapse.show').each(function(){
            $(this).parent().find(".fa").removeClass("fa-plus").addClass("fa-minus");
        });
        //Toggle plus/minus icon on show/hide of collapse element
        $('.collapse').on('shown.bs.collapse', function(){
            $(this).parent().find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hidden.bs.collapse', function(){
            $(this).parent().find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
@endsection
