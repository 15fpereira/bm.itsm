@extends('layouts.applg')
@section('title')
    {{__('log in')}}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">

        @if(session('status'))

            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
                    <!-- Home notification -->
        <div class="alert alert-dismissible alert-info">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atenção!  </font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este </font></font><a href="#" class="alert-link"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">alerta precisa de sua atenção</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> , mas não é super importante.
          </font></font></div>
        <!-- End notification -->
        @endif

        <div class="col-lg-4 col-md-8 col-8">
            <div class="card shadow">
                <div class="card-title text-center border-bottom">
                    <h5 class="p-3"><i class="fa-solid fa-right-to-bracket"></i>&nbsp; {{__('Log in')}}</h5>
                </div>
                <div class="card-body">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <!-- Home form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <i class="fa fa-envelope"></i>
                                <label for="username" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa-solid fa-envelopes"></i>&nbsp; username</font></font></label>
                                <input type="text" class="form-control" id="username" name="username" :value="old('username')" aria-describedby="emailHelp" placeholder="Digite o username" required autofocus>
                                <small id="emailHelp" class="form-text text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nunca compartilharemos seu e-mail com mais ninguém.</font></font></small>
                            </div>

                            <div class="form-group">
                                <i class="fa fa-unlock"></i>&nbsp;
                                <label for="password" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Senha</font></font></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required autocomplete="current-password">
                            </div>

                            <div class="mt-4">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                                <label for="remember_me">Salvar-me</label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        Esqueceu a senha?
                                    </a>
                                @endif
                            </div>
                            <div class="d-grid mt-4">
                                <x-button class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp; {{ __('Log in') }}
                                </x-button>
                            </div>
                        </form>
                        <!-- End form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
