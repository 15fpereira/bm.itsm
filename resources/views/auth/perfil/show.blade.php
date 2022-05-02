@extends('layouts.apps')
@section('title')
    Perfil do usuário
@endsection
@section('content')
@php
    $i = 0
@endphp

        <div class="container">
            <div class="row mt-2">
                <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Perfil
                     </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">editar perfil de usuário.</font></font></small>
                  </h5>
            </div>
            <div class="row mt-2">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        <i class="fa-solid fa-screwdriver-wrench"></i>&nbsp; Nome: {{$user::find($perfil)->name}}
                        </font></font><span class="badge bg-success rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar</font></font></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        <i class="fa-solid fa-arrow-up-1-9"></i>&nbsp; Quantidade de serviços registrado:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">y</font></font></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        <i class="fa-solid fa-list-ol"></i>&nbsp; Portfolio de serviço:
                        </font></font><span class="badge bg-primary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">z</font></font></span>
                    </li>
                </ul>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h5>Utilizando update existente</h5>
                    <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="post" action="{{ route('perfil.update',$perfil) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <!-- Password Reset Token
                <input type="hidden" name="token" value="{{ $request->route('token') }}">  -->

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">E-mail</font></font></label>
                    <div class="col-sm-10">
                        <x-input readonly="" id="email" class="form-control" type="email" name="email" :value="old('email', $user::find($perfil)->email)" required autofocus />
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group row">
                    <label for="password" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('Password')}}</font></font></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                </div>

                <!-- Email Address -->

                <!-- Password
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div> -->

                <!-- Confirm Password -->
                <div class="form-group row">
                    <x-label for="password_confirmation" class="form-label mt-4" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    <x-button class="btn btn-success">
                        {{ __('Reset Password') }}
                    </font></font></x-button>

                </div>
            </form>


                </div>
                <div class="col">
                    <h5>Editar Usuário</h5>
                    <div class="accordion mt-2" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fas fa-edit"></i>&nbsp;<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                              Editar nome do usuário
                            </font></font></button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="accordion-body">
                              <strong><font style="vertical-align: inherit;">

                                <form method="post" action="{{route('perfil.update', $perfil)}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="put">
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$user::find($perfil)->name}}" aria-label="Nome de usuário do destinatário" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-info" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar nome</font></font></button>
                                    </div>
                                </form>

                                </font></strong><font style="vertical-align: inherit;">
                            </font></font></div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fas fa-edit"></i>&nbsp;<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                              Editar e-mail
                            </font></font></button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                            <div class="accordion-body">
                              <strong><font style="vertical-align: inherit;">
                                <form method="post" action="{{route('perfil.update', $perfil)}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="put">
                                    <div class="input-group mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="{{$user::find($perfil)->email}}" aria-label="Nome de usuário do destinatário" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-info" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar e-mail</font></font></button>
                                    </div>
                                </form>
                                </font></strong><font style="vertical-align: inherit;">
                                </font></strong>
                            </font></font></div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                              Item de acordeão nº 3
                            </font></font></button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="accordion-body">
                              <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este é o corpo sanfonado do terceiro item. </font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ele fica oculto por padrão, até que o plug-in de recolhimento adicione as classes apropriadas que usamos para estilizar cada elemento. </font><font style="vertical-align: inherit;">Essas classes controlam a aparência geral, bem como a exibição e ocultação por meio de transições CSS. </font><font style="vertical-align: inherit;">Você pode modificar qualquer um deles com CSS personalizado ou substituindo nossas variáveis ​​padrão. </font><font style="vertical-align: inherit;">Também vale a pena notar que praticamente qualquer HTML pode ir dentro do </font></font><code>.accordion-body</code><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">, embora a transição limite o estouro.
                            </font></font></div>
                          </div>
                        </div>
                      </div>


                </div>


            </div>
        </div>
@endsection
