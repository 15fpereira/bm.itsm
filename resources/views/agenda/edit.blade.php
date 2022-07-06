<tr class="table-dark">

    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a class="btn btn-link" href="#">{{$agenda->created_at}}</a></font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a class="btn btn-link" href="#">{{$agenda->updated_at}}</a></font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><button type="button" @if($chamado->status == "Concluido") class="btn btn-secondary disabled btn-sm" @endif @if($chamado->status != "Concluido") class="btn btn-secondary btn-sm" @endif data-toggle="modal" data-target="#exModal{{$loop->iteration}}">{{$agenda->status}}</button></font></font></td>
</tr>
<!-- Start Modal -->
<div class="modal fade" id="exModal{{$loop->iteration}}" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Agenda - situação atual: {{$agenda->status}}</font></font></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">

            <!-- Form -->
            <form method="post" action="{{route('agendas.update', [$agenda])}}" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

            <!-- Home col -->
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                    <fieldset @if($chamado->status == "Concluido" or Auth::user()->status == 'padrao') disabled="" @endif>
                        <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Observação:</font></font></label>
                        <textarea class="form-control" id="observacao" name="observacao" value="{{$agenda->observacao}}" placeholder="{{$agenda->observacao}}" rows="3">{{$agenda->observacao}}</textarea>
                    </fieldset>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                    <fieldset @if($chamado->status == "Concluido" or Auth::user()->status == 'padrao') disabled="" @endif>
                        <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição:</font></font></label>
                        <textarea class="form-control" id="descricao" name="descricao" value="{{$agenda->descricao}}" placeholder="{{$agenda->descricao}}" rows="3">{{$agenda->descricao}}</textarea>
                    <fieldset>
                    </div>
                </div>
            </div>
            <!-- End col -->


                <!-- Home Radios -->
                <fieldset @if($chamado->status == "Concluido" or Auth::user()->status == 'padrao') disabled="" @endif>
                <legend class="mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Situação da agenda atual:</font></font></legend>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="Agendado" @if($agenda->status == "Agendado") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Agendado:
                    </font></font></label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="Em andamento" @if($agenda->status == "Em andamento") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Em andamento:
                    </font></font></label>
                </div>
                <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="Concluido" @if($agenda->status == "Concluido") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Concluido:
                    </font></font></label>
                </div>
                <fieldset>
            <!-- End Radios -->
        </div>
        <div class="modal-footer">

          <button type="submit" @if($chamado->status == "Concluido" or Auth::user()->status == 'padrao') class="btn btn-primary disabled" @else class="btn btn-primary" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Salvar alterações</font></font></button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sair</font></font></button>
        </div>
            </form>
            <!-- End Form -->
      </div>
    </div>
  </div>
<!-- End Modal -->
