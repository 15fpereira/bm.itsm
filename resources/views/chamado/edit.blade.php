<!-- Start Contact Form -->
<form class="contact-form" id="contact-form" role="form" method="post" action="{{route('chamados.update', $chamado->id)}}">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relato do usuário:</font></font></label>
                <textarea class="form-control" id="descricao" name="descricao" value="{{$chamado->descricao}}" placeholder="{{$chamado->descricao}}" rows="3">{{$chamado->descricao}}</textarea>
            </div>
            <legend class="mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status do chamado:</font></font></legend>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="Atendimento In loco" @if($chamado->status == "Atendimento In loco") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Atendimento In loco:
                </font></font></label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value=" Atendimento remoto" @if($chamado->status == " Atendimento remoto") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Atendimento remoto:
                </font></font></label>
            </div>
            <!-- isset — Informa se a variável foi iniciada, só mostra o conteudo de if se existe -->
            <div class="form-check disabled">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="Cancelado" @if (!isset($a)) disabled="Cancelado" @endif @if (isset($a)) @if($a->status != "Cancelado") disabled="Cancelado" @endif @endif @if($chamado->status == "Cancelado") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Cancelado:
                </font></font></label>
            </div>
    <!-- if para alterar o nome do botão no ultimo estágio do chamado -->
    <button type="submit" class="btn btn-secondary btn-sm mt-4"><i class="fa fa-check"></i>&nbsp; @if ($chamado->status == "Concluido" && $a->status == "Concluido") Finalizar @else Confirmar @endif</button>
    <button type="link" class="btn btn-secondary btn-sm mt-4" onClick="history.go(-1)"><i class="fa fa-level-down fa-rotate-90"></i>&nbsp; Sair</button> <!-- Aqui implementar a função voltar, ou retear para um determinado lugar -->
    <input type="button" class="btn btn-secondary btn-sm mt-4" value="Voltar" onClick="history.go(-1)">



</form>
<!-- End Contact Form -->






