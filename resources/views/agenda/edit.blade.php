<tr class="table-dark">
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a class="btn btn-link" href="#">{{$agenda->created_at}}</a></font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a class="btn btn-link" href="#">{{$agenda->updated_at}}</a></font></font></td>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exModal2">{{$agenda->status}}</button></font></font></td>
</tr>
<!-- Start Modal -->
<div class="modal fade" id="exModal2" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
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

                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Observação:</font></font></label>
                    <textarea class="form-control" id="observacao" name="observacao" value="{{$agenda->observacao}}" placeholder="{{$agenda->observacao}}" rows="3">{{$agenda->observacao}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição:</font></font></label>
                    <textarea class="form-control" id="descricao" name="descricao" value="{{$agenda->descricao}}" placeholder="{{$agenda->descricao}}" rows="3">{{$agenda->descricao}}</textarea>
                </div>
                <!-- Home Radios -->
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
                    <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="" disabled="Concluido"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Concluido:
                    </font></font></label>
                </div>
            <!-- End Radios -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Salvar alterações</font></font></button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sair</font></font></button>
        </div>
            </form>
            <!-- End Form -->
      </div>
    </div>
  </div>
<!-- End Modal -->