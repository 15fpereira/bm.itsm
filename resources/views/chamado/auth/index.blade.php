@extends('layouts.apps')
@section('title')
    {{__('Meus chamados')}}
@endsection
@section('content')
<div class="container">
    <div class="row mt-4">
        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Meus
             </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">chamados </font></font></small>
        </h4>
    </div>

    <div class="col mt-4">


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
            @foreach ($chamados as $chamado)
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
    </div>
  </div>


@endsection
