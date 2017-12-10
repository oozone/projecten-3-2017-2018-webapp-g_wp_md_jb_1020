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

    <title>{{ config('app.name', 'Waterpolo') }}</title>

    {{ ScriptVariables::render() }}
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!--<div style="float: right; margin-bottom: 0px; margin-right: 1%;">

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
        </div>-->
        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>


</body>
</html>
