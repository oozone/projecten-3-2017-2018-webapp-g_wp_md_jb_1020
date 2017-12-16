<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{ ScriptVariables::render() }}
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <script src="https://use.fontawesome.com/ed1dab6703.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Waterpolo') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>



                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
	                <?php $urls = dispatch_now(new \Keevitaja\Linguist\Switcher); ?>
                    <div class="dropdown pull-right language-switcher" style="margin-top: 6px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @foreach($urls as $key => $url)
                                @if ($key == 'en')
                                    <li><a href="{{ $url }}"><span class="flag-icon flag-icon-gb"></span> {{ $key }}</a></li>
                                @else
                                    <li><a href="{{ $url }}"><span class="flag-icon flag-icon-{{ $key }}"></span> {{ $key }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="wrapper" style="">
                <!-- Sidebar -->
                <nav id="sidebar" class="">
                    <div class="sidebar-header">


                        <div class="brand">ADMIN</div>

                    </div>
                        <div class="nav-side-menu">

                            <ul id="menu-content" class="">
                                <li>
                                    <a href="{{ url('admin/')}}">
                                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                                    </a>
                                </li>

                                <!-- Player -->
                                <li  data-toggle="collapse" data-target="#players" class="collapsed active">
                                    <a href="#"><i class="fa fa-user fa-lg"></i> {{ __('Players') }} <span class="arrow"></span></a>
                                </li>
                                <ul class="sub-menu collapse" id="players">
                                    <li><a href="{{ url('admin/players')}}">{{ __('List') }}</a></li>
                                    <li><a href="{{ url('admin/players/create')}}">{{ __('Create') }}</a></li>
                                </ul>

                                <!-- Team -->
                                <li  data-toggle="collapse" data-target="#teams" class="collapsed active">
                                    <a href="#"><i class="fa fa-users fa-lg"></i> {{ __('Teams') }} <span class="arrow"></span></a>
                                </li>
                                <ul class="sub-menu collapse" id="teams">
                                    <li><a href="{{ url('admin/teams')}}">{{ __('List') }}</a></li>
                                    <li><a href="{{ url('admin/teams/create')}}">{{ __('Create') }}</a></li>
                                </ul>

                                <!-- Match -->
                                <li  data-toggle="collapse" data-target="#matches" class="collapsed active">
                                    <a href="#"><i class="fa fa-calendar fa-lg"></i> {{ __('Matches') }} <span class="arrow"></span></a>
                                </li>
                                <ul class="sub-menu collapse" id="matches">
                                    <li><a href="{{ url('admin/matches')}}">{{ __('List') }}</a></li>
                                    <li><a href="{{ url('admin/matches/create')}}">{{ __('Create') }}</a></li>
                                    <li><a href="{{ url('admin/matches/finasheets')}}">{{ __('FINA-sheets') }}</a></li>
                                </ul>

                                <!-- Location -->
                                <li  data-toggle="collapse" data-target="#locations" class="collapsed active">
                                    <a href="#"><i class="fa fa-globe fa-lg"></i> {{ __('Locations') }} <span class="arrow"></span></a>
                                </li>
                                <ul class="sub-menu collapse" id="locations">
                                    <li><a href="{{ url('admin/locations') }}">{{ __('List') }}</a></li>
                                    <li><a href="{{ url('admin/locations/create')}}">{{ __('Create') }}</a></li>
                                </ul>
                                <li>
                                    <a href="{{ url('admin/scoreboard') }}"><i class="fa fa-television fa-lg"></i>&nbsp;{{ __(' Scoreboard') }}</a>
                                </li>

                            </ul>

                        </div>

                </nav>
            <div id="content">

                    <div class="container2" style="padding-top: 30px; ">
                        @yield('content')
                    </div>

            </div>
        </div>
</div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>

</body>
</html>
