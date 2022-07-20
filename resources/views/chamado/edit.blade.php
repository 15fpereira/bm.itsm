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
                <input type="radio" class="form-check-input" name="tipo" id="optionsRadios1" value="Atendimento In loco" @if($chamado->tipo == "Atendimento In loco") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Atendimento In loco:
                </font></font></label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="tipo" id="optionsRadios2" value="Atendimento remoto" @if($chamado->tipo == "Atendimento remoto") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Atendimento remoto:
                </font></font></label>
            </div>
            <!-- isset — Informa se a variável foi iniciada, só mostra o conteudo de if se existe -->
            <div class="form-check disabled">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="tipo" id="optionsRadios3" value="Cancelado" @if (!isset($a)) disabled="Cancelado" @endif @if (isset($a)) @if($a->tipo != "Cancelado") disabled="Cancelado" @endif @endif @if($chamado->tipo == "Cancelado") checked="" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Cancelado:
                </font></font></label>
            </div>
            @isset($a)
            @if ($a->status == "Concluido")
                <input type="hidden" name="status" value='Fechado'>
            @elseif ($a->status == "Agendado" or $a->status == "Em andamento")
                <input type="hidden" name="status" value='Aberto'>
            @endif
            @endisset
            @empty($a)
                <input type="hidden" name="status" value='Aberto'>
            @endempty



    <!-- if para alterar o nome do botão no ultimo estágio do chamado -->
    <button type="submit" @isset($a) @if($a->status == "Concluido") class="btn btn-success btn-sm mt-4"  @else class="btn btn-secondary btn-sm mt-4" @endif @endisset @empty($a) class="btn btn-secondary btn-sm mt-4" @endempty ></i>&nbsp; @isset($a) @if($a->status == "Concluido") <i class="fa fa-check"></i>&nbsp;Finalizar chamado @else <i class="fa fa-check"></i>&nbsp;Confirmar @endif @endisset @empty($a) <i class="fa fa-check"></i>&nbsp;Confirmar @endempty</button>
    <button type="link" class="btn btn-secondary btn-sm mt-4" onClick="history.go(-1)"><i class="fa fa-level-down fa-rotate-90"></i>&nbsp; Sair</button> <!-- Aqui implementar a função voltar, ou retear para um determinado lugar -->
    <input type="button" class="btn btn-secondary btn-sm mt-4" value="Voltar" onClick="history.go(-1)">
    @if ($chamado->status == 'Fechado')
        <button type="submit" class="btn btn-primary btn-sm mt-4"  ><i class="fa fa-check"></i>&nbsp;Reivindicar </button>
    @endif



</form>
<!-- End Contact Form -->






