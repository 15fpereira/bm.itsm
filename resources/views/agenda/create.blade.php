<!-- Button trigger modal
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
 -->


<!-- Button trigger modal -->
<button type="button" @if($chamado->status == "Concluido" or Auth::user()->status == 'padrao') class="btn btn-secondary disabled btn-sm" @endif @if($chamado->status != "Concluido") class="btn btn-secondary btn-sm" @endif data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus"></i>&nbsp; Agendar nova tarefa</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Deseja agendar uma nova tarefa?
                <h5 class="modal-title" id="exampleModalLabel1"> <i class="fas fa-exclamation-triangle"></i> </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method="post" action="{{route('agendas.store')}}" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Entra com observação:</font></font></label>
                        <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="observacao" id="observacao" required>

                    </div>

                    <fieldset class="form-group">
                        <legend class="mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status da Agenda:</font></font></legend>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="Agendado" checked=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Agendado:
                            </font></font></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="Em andamento"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Em andamento:
                            </font></font></label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="" disabled="Concluido"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Concluido:
                            </font></font></label>
                        </div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

                   <!-- Form <input type="hidden" name="_method" value="DELETE"> -->

                    <input type="hidden" name="chamado_id" value="{{$chamado->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Sim</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
