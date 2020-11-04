<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Loja') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registre-se') }}</a>
            </li>
            @endif
            @else
            <!--  Menu da Aplicação  -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Cadastros
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> Usuário</a>
                @if (in_array(Auth::user()->COD_TIPO_USUARIO, [1,2]))
                <a class="dropdown-item" href="{{ route('TipoUsuario') }}"> Tipo Usuário</a>
                @endif
                <a class="dropdown-item" href="#"> Situação Compra</a>
                <a class="dropdown-item" href="#"> Promoção</a>                
                <a class="dropdown-item" href="#"> Produto</a>
                <a class="dropdown-item" href="{{ route('Grupo') }}"> Grupo</a>
                <a class="dropdown-item" href="{{ route('Fabricante') }}"> Fabricante</a>
                <a class="dropdown-item" href="#"> Departamento</a>
                @if (Auth::user()->COD_TIPO_USUARIO === 1)
                <a class="dropdown-item" href="{{ route('CondicaoPagamento') }}"> Condição de Pagamento</a>
                @endif
                <a class="dropdown-item" href="#"> Cliente</a>
                <a class="dropdown-item" href="#"> Categoria</a>            
                <a class="dropdown-item" href="{{ route('Caracteristica') }}"> Caracteristica</a>
                <!-- <a class="dropdown-item" href="{{ route('SituacaoCompra') }}"> Situação Compra</a> -->
            </div>
        </li>
        <!-- Fim do menu da aplicação -->

        <!-- Menu de Login/Logout -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->NOM_USUARIO }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
<!-- Fim do menu de Login/Logout -->
@endguest
</ul>
</div>
</div>
</nav>