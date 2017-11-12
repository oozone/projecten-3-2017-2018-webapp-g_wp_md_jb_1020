<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-3">
                <div class="nav-side-menu">
                    <div class="brand">ADMIN</div>
                    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                    <div class="menu-list">

                        <ul id="menu-content" class="menu-content collapse out">
                            <li>
                                <a href="#">
                                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                                </a>
                            </li>

                            <!-- Player -->
                            <li  data-toggle="collapse" data-target="#players" class="collapsed active">
                                <a href="#"><i class="fa fa-user fa-lg"></i> Players <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="players">
                                <li><a href="/admin/players">List</a></li>
                                <li><a href="/admin/players/create">Create</a></li>
                            </ul>

                            <!-- Team -->
                            <li  data-toggle="collapse" data-target="#teams" class="collapsed active">
                                <a href="#"><i class="fa fa-users fa-lg"></i> Teams <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="teams">
                                <li><a href="/admin/teams">List</a></li>
                                <li><a href="/admin/teams/create">Create</a></li>
                            </ul>

                            <!-- Match -->
                            <li  data-toggle="collapse" data-target="#matches" class="collapsed active">
                                <a href="#"><i class="fa fa-calendar fa-lg"></i> Matches <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="matches">
                                <li><a href="/admin/matches">List</a></li>
                                <li><a href="/admin/matches/create">Create</a></li>
                            </ul>

                            <!-- Location -->
                            <li  data-toggle="collapse" data-target="#locations" class="collapsed active">
                                <a href="#"><i class="fa fa-globe fa-lg"></i> Locations <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="locations">
                                <li><a href="/admin/locations">List</a></li>
                                <li><a href="/admin/locations/create">Create</a></li>
                            </ul>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                @yield('content')
            </div>
        </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
