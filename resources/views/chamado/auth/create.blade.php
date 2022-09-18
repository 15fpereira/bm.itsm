<!-- Button trigger modal -->
<a href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalSelecDinamico"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Novo chamado</font></font></a>
<a href="{{route('portfolios.index')}}" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-list"></i>&nbsp; Portfólido de serviços de TI</font></font></a>
 <!-- Somente usuário padrao -->
 @if (Auth::user()->status != 'adm')
 <a href="/meuschamados" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Meus chamados</a>
@endif
<!-- Somente administrador -->
@if (Auth::user()->status == 'adm')
 <a href="{{route('chamados.index')}}" class="btn btn-secondary"><i class="fa fa-list"></i>&nbsp; Todos os chamados</a>
@endif
<!-- Modal -->
<div class="modal fade" id="ModalSelecDinamico" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exModalLabel1">Deseja criar um novo chamado? <i class="fa fa-cogs"></i></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form name="personForm" id="personForm" method="post" action="{{route('meuschamados.store')}}" class="form-horizontal">
                    {{csrf_field()}}
                     <!-- Form <input type="hidden" name="_method" value="DELETE"> -->
                     <input type="hidden" name="status" value="Aberto">
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <!-- home col -->
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de serviços de TI:</font></font></label>
                                <select id="portfolio_id" class="form-select" value="{{ old('portfolio_id') }}" >
                                    @foreach (App\Models\Portfolio::all() as $portfolio)
                                        <option value="{{$portfolio->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$portfolio->tipo}}</font></font></option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="span-model" style="display: nome;">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lista de serviços:</font></font></label>
                                        <select name="servico_id" id="servico_id" class="form-select" value="{{ old('servico_id') }}" >
                                                <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione a opção</font></font></option>

                                        </select>
                                    </div>
                                </div>

                            </span>
                        </div>
                        <div class="col-8">
                                    <!-- https://youtu.be/LuC0olmGlbk -->
                            <div class="form-group">
                                <label class="col-form-label col-form-label-lg" for="inputLarge"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Relato do usuário:</font></font></label>
                                <textarea class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="descricao" id="descricao" required></textarea>
                            </div>

                            <fieldset class="form-group">
                                <legend class="mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de chamado:</font></font></legend>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tipo" id="optionsRadios1" value="In loco" checked="" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Atendimento In loco:
                                    </font></font></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tipo" id="optionsRadios2" value="Atendimento remoto" checked="" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Atendimento remoto:
                                    </font></font></label>
                                </div>
                                <div class="form-check disabled">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tipo" id="optionsRadios3" value="" disabled="Cancelado"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Cancelado:
                                    </font></font></label>
                                </div>
                            </fieldset>

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Criar</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Select dinamico com Javascript -->
<script>
        $(function()
        {
            $("#portfolio_id").on('change', onSelectChange);
        });
        function onSelectChange()
        {
            var portfolio_id = $(this).val();

            if(! portfolio_id)
            {
                $('#servico_id').html('<option>Não possui informação</option>');
                return;
            }
            // alert(portfolio_id);
            //ajax
            $.get('/selects/'+portfolio_id+'/servico', function(data)
            {
               var html_select = '<option>Seleciona a opção desejada</option>';
                // alert(data[i]);
                for(var i=0; i<data.length; ++i)
               // console.log(data[i]);
                    html_select += '<option value="'+data[i].id+'"">'+data[i].nome+' ('+data[i].descricao+') </option>';
                console.log(html_select);
                $('#servico_id').html(html_select);
            });
        };

</script>

