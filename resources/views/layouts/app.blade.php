<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body>

    <div id="app">
        <nav class="bg-primary navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="color: white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">

                                <a class="nav-link" style="color: white" href="{{ route('login') }}">
                                    <i class="fab fa-log-in"></i> {{ __('Prijavi se') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Registriraj se') }}</a>
                                </li>
                            @endif
                        @else

                            @can('for-users')

                                <li>
                                    <a class="nav-link" style="color: white" href="{{route('documents.create')}}"><i class="fas fa-file-alt"></i> Objavi dokument</a>
                                </li>
                            @endcan

                                @can('delete-users')

                                <li>
                                    <a class="nav-link" style="color: white" href="{{ route('categories.create') }}"><i class="fas fa-folder-plus"></i> Napravi novu kategoriju</a>
                                </li>
                                @endcan



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @can('for-users')
                                        <a class="dropdown-item" href="{{ route('my_documents.show',Auth::user()) }}">
                                            <i class="fas fa-id-card-alt"></i> Moji dokumenti
                                        </a>
                                    @endcan

                                    @can('manage-users')
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        <i class="fas fa-users-cog"></i> Upravljajte korisnicima
                                    </a>
                                    @endcan


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                         {{ __('Odjavite se') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>



        <main class="py-4">
            <div class="container">
                @include('partials.alerts')
                @yield('content')
            </div>
        </main>

        <footer class="bg-primary text-white text-center text-lg-start">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">O nama</h5>

                        <p align="justify">
                            Studentski materijali, je web stranica izrađena u svrhu kolegija "Projektiranje
                            informacijskih sustava". Ideja web aplikacije jeste da se omogući korisnicima objava, pretraga, te preuzimanje materijala po kategorijama u svrhu učenja.
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Pogledajte</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white"><i class="fab fa-github"></i> GitHub</a>
                            </li>

                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Informacije</h5>

                        <ul class="list-unstyled" align="justify">
                            <li>
                                <a href="#!" class="text-white">Marko Galić&emsp;&emsp;537/RM&emsp;marko.galic@student.fsre.ba</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Branimir Bulić&emsp;548/RM&emsp;branimir.bulic@student.fsre.ba</a>
                            </li>

                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                &copy; <?php echo date("Y"); ?>:
                <a class="text-white" href="{{ url('/') }}">Studentski materijali</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>

</body>
</html>
