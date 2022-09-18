<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ "/" }}"><i class="fa fa-home fa-1x" aria-hidden="true"></i>&nbsp; Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-circle-user"></i>&nbsp; {{ Auth::user()->name}}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('perfil.show',Auth::user()->id)}}">Perfil</a>
                        <a class="dropdown-item" href="#">Listar</a>
                         <div class="dropdown-divider"></div>
                        <!-- Authentication href="#">Separated link -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('painel') }}"><i class="fa-solid fa-indent"></i>&nbsp; Painel
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
        </div>
    </div>
</nav>
