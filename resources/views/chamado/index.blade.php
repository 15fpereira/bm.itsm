@extends('layouts.apps')
@section('title')
    {{__('Todos os chamados')}}
@endsection
@section('content')
<div class="container">

    <div class="row mt-4">
        @if(Session::has('flash_message'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-dismiss="alert"></button>
                <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Messagem de confirmação! </font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{Session::get('flash_message')}}</font></font><a href="#" class="alert-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    </font></font>
            </div>
        @endif
    </div>





    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" data-toggle="tab" href="#aberto" aria-selected="true" role="tab"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abertos</font></font></a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="tab" href="#fechado" aria-selected="false" role="tab" tabindex="-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fechados</font></font></a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link disabled" href="#" aria-selected="false" tabindex="-1" role="tab"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Desabilitado</font></font></a>
        </li>

    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="aberto" role="tabpanel">

            <div class="row mt-4">
                <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Todos
                     </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">chamados abertos</font></font></small>
                </h4>
            </div>

            <div class="col mt-4">

                <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aberto por</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atendido por</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviço</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dt início</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dt limite</font></font></th>
                          <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">abrir</font></font></th>

                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($chamados as $chamado)
                        @php
                            $servico = App\Models\Servico::find($chamado->servico_id)->sla;
                            $timeinicial = strtotime($chamado->created_at);

                            if ($servico == '02:00:00') {
                                # code...
                                $timefinal = strtotime('+2 hour', $timeinicial);
                            }
                            elseif ($servico == '04:00:00') {
                                # code...
                                $timefinal = strtotime('+4 hour', $timeinicial);

                            }
                            $memos30 = strtotime('-30 minute', date($timefinal));
                        @endphp

                        <!--Determina se a variável existe, caso verdadeiro mostra a tabela abaixo -->
                        @isset($chamado)
                        <tr class="table-active">
                            <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->id}}</font></font></th>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($chamado->user_id)->name}}</font></font></td>
                            <!--Esta linha Determina o tecnico que esta atendendo o chamado -->
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find(App\Models\Agenda::find($chamado->user_id)->user_id)->name}}</font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span @if ($chamado->status == 'Em andamento')
                                class="badge bg-success"
                            @elseif ($chamado->status == 'Concluido')
                                class="badge bg-danger"
                            @else
                                class="badge bg-warning"
                            @endif ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->status}}</font></font></span></font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\Servico::find($chamado->servico_id)->nome}}</font></font></span></td>
                            <td><font style="vertical-align: inherit;"><span class="badge bg-info"><font style="vertical-align: inherit;">{{$chamado->created_at->format('d/m/Y H:i:s')}}</font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span @if (date('m-d-y H:i:s') < date('m-d-y H:i:s',$timefinal))
                                class="badge bg-success"
                            @elseif (date('m-d-y H:i:s') > $memos30)
                                class="badge bg-warning"
                            @else
                                class="badge bg-danger"
                            @endif ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{date('d/m/Y H:i:s',$timefinal)}}</font></font></span></font></font></td>

                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('chamados.show',$chamado)}}"><i class="fa fa-level-up" aria-hidden="true"></i></a></font></font></td>
                        </tr>
                        @endisset
                        @endforeach
                        <!-- Determina se a variável é vazia, caso verdadeiro mostra a mensagem abaixo-->
                        @empty($chamado)
                        <tr class="table-active">
                            <td colspan="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                <h3 class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Whoops!
                                    </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não possui nenhum chamado aberto.</font></font></small>
                                </h3>
                            </td>
                        </tr>
                        @endempty

                      </tbody>
                </table>
                <h5>Pagination:</h5>
                {{$chamados->links()}}

            </div>


        </div>
        <div class="tab-pane fade" id="fechado" role="tabpanel">


            <?php
                use App\Models\Chamado;
                $chamados2 = Chamado::where('status', 'Fechado')->orderBy('id', 'desc')->simplePaginate(4);
            ?>

        <div class="row mt-4">
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Todos
                </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">chamados fechados</font></font></small>
            </h4>
        </div>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número</font></font></th>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Técnico:</font></font></th>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serviço</font></font></th>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dt de criação</font></font></th>
                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">abrir</font></font></th>
                </tr>
            </thead>

            <tbody>
            @foreach ($chamados2 as $chamado)
                <!--Determina se a variável existe, caso verdadeiro mostra a tabela abaixo. -->
                <!--Determina condicional para demostra o status com cores na terceira colula da tabela. -->
                @isset($chamado)
                    <tr class="table-active">
                        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->id}}</font></font></th>
                        <!-- loop aninhado para pegar o valor da chave estrangeira referente ao usuário -->
                        <!-- Como verificar se o array está vazio no Blade? fonte: https://www.itsolutionstuff.com/post/laravel-how-to-check-if-array-is-empty-in-bladeexample.html -->
                        @forelse ($chamado->agendas as $agenda)
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{App\Models\User::find($agenda->user_id)->name}}</font></font></td>
                        @empty
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não foi definido</font></font></td>
                        @endforelse

                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span

                        @if ($chamado->status == 'Aberto')
                            class="badge bg-success"
                        @elseif ($chamado->status == 'Fechado')
                            class="badge bg-danger"
                        @else
                            class="badge bg-warning"
                        @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->status}}</font></font></span></font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->descricao}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$chamado->created_at}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{route('chamados.show',$chamado)}}"><i class="fa fa-level-up" aria-hidden="true"></i></a></font></font></td>
                    </tr>
                @endisset
            @endforeach
                <!-- Determina se a variável é vazia, caso verdadeiro mostra a mensagem abaixo-->
                @empty($chamado)
                <tr class="table-active">
                    <td colspan="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                        <h3 class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Whoops!
                            </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Não possui nenhum chamado listado.</font></font></small>
                        </h3>
                        <p class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{Auth::user()->name}}  </font></font><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Caso deseje abrir um chamado, var até o painel e clica no portfolio de serviços de TI.</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p>
                    </td>
                </tr>
                @endempty
            </tbody>
        </table>
        <h5>Pagination:</h5>

        <div class="py-4">
            {{ $chamados2->links() }}
        </div>






    </div>
        <div class="tab-pane fade" id="dropdown1">
          <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etsy mixtape wayfarers, tofu ético de wes anderson antes de esgotar o lomo retro fanny pack lo-fi orgânico da mcsweeney's farm-to-table readymade. </font><font style="vertical-align: inherit;">Bolsa mensageiro gentrify pitchfork tatuado cerveja artesanal, iphone skate locavore carles etsy salvia banksy moletom com capuz helvetica. </font><font style="vertical-align: inherit;">DIY synth PBR Banksy ironia. </font><font style="vertical-align: inherit;">Leggings gentrify squid forquilha de crédito de 8 bits.</font></font></p>
        </div>
        <div class="tab-pane fade" id="dropdown2">
          <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fundo fiduciário tipografia seitan, keytar raw denim keffiyeh etsy art party antes de esgotar master cleanse lula sem glúten scenester freegan cosby suéter. </font><font style="vertical-align: inherit;">Fanny pack portland seitan DIY, art party locavore wolf cliche high life eco park Austin. </font><font style="vertical-align: inherit;">Cred vinil keffiyeh DIY salvia PBR, banh mi antes de esgotarem VHS viral locavore cosby suéter.</font></font></p>
        </div>
      </div>




</div>
@endsection
