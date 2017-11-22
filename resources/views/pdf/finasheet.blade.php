
<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <style>

        body {
            font-size: 9px;
        }

        table { border-collapse: separate; border-spacing: 0px; margin: 0px; border: 1px solid black; }
        td { border: 1px solid black; width: 10px; height: 10px; padding: 2px;}

        table.noborder {
            border: 0px;
        }

        table.noborder td {
            border: 0px;
        }

        div.sides {height:100%}

        .tc {
            text-align: center;
        }

        table.fw {
            width: 100%
        }
    </style>
</head>
<body>

<table class="fw" style="margin:0 auto; border: 0px;">

    <tr>
        <!-- LEFT -->
        <td width="30%" style="border: 0px;">
            <div class="sides">
                <!-- Table A1 -->
                <table class="fw noborder">
                    <tr>
                        <td><img src="images/logo/finalogo.png" width="50px" /></td>
                        <td style="text-align: center;"><h2 style="color: grey;">MATCH DETAILS</h2></td>
                    </tr>
                    <tr>
                        <td>GAME</td>
                        <td>{{$match->home->name}} - {{$match->visitor->name}}</td>

                    </tr>
                    <tr>
                        <td>GAME NO</td>
                        <td>{{ $match->id }}</td>
                    </tr>
                    <tr>
                        <td>VENUE</td>
                        <td>{{ $match->location->name }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="fw noborder">
                                <tr>
                                    <td>Date</td>
                                    <td>{{$match->datum}}</td>
                                    <td>Time</td>
                                    <td>{{$match->datum}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <!-- Table A2-->
                <div style="text-align: center;">
                    <h1>White Caps</h1>
                </div>

                <table class="fw">
                    <tr>
                        <td>TEAM</td>
                        <td>{{$match->home->name}}</td>
                    </tr>
                    <tr>
                        <td>
                            Coach:
                        </td>
                        <td>{{$match->home->coach->name}}</td>
                    </tr>
                    <tr>
                        <td>Assistent coach 1:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Assistent coach 2:</td>
                        <td></td>
                    </tr>
                </table>

                <!-- Table A3 -->
                <table  style="width: 97%; border: 0px;">
                    <tr>
                        <td class="tc">NA</td>
                        <td class="tc">Player</td>
                        <td style="width: 20%" class="tc" colspan="3">Major fouls</td>
                        <td>
                            <table class="fw">
                                <tr>
                                    <td class="tc" colspan="5">Goals by quarter</td>
                                </tr>
                                <tr>
                                    <td class="tc">1</td>
                                    <td class="tc">2</td>
                                    <td class="tc">3</td>
                                    <td class="tc">4</td>
                                    <td class="tc">PSO</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fouten -->
                    @foreach($match->home->players as $p)

                        <tr>
                            <td class="tc">{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td colspan="3">
                                <table class="fw noborder">
                                    <tr>
                                    @foreach($foutenThuis as $m)
                                        <!-- als overeenkomt, gemaakte fouten overlopen -->

                                            @if($loop->iteration < 4)

                                                @if($m->player_id == $p->id)

                                                    @for($i = 0; $i < $m->aantalfouten; $i++)
                                                        @if($i < 3)
                                                            <td class="tc">X</td>
                                                        @endif
                                                    @endfor

                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="fw">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!-- Table A4 -->
                <table class="fw">
                    <tr>
                        <td class="tc">RESULT</td>
                        <td class="tc">1</td>
                        <td class="tc">2</td>
                        <td class="tc">3</td>
                        <td class="tc">4</td>
                        <td class="tc">PSO</td>
                        <td class="tc">TOTAL</td>
                        <td colspan="4">TIMEOUT</td>
                    </tr>
                    <tr>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc">1</td>
                        <td class="tc">2</td>
                        <td class="tc">3</td>
                        <td class="tc">4</td>
                    </tr>
                    <tr>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                    </tr>
                </table>
            </div>
        </td>

        <!-- MIDDLE -->
        <td width="30%"  style="border: 0px;">
            <h3 style="text-align: center;">FINA<br />WATER POLO SCORESHEET</h3>

            <!-- Table B1 -->
            <table class="fw">
                <tr>
                    <!-- Linkerkant -->
                    <td>
                        <table class="fw" style="border: 0px;">
                            <tr>
                                <td class="tc">Time</td>
                                <td class="tc">Player</td>
                                <td class="tc">Colour</td>
                                <td class="tc">Comment</td>
                                <td class="tc">Score</td>
                                <td class="tc">Time</td>
                                <td class="tc">Player</td>
                                <td class="tc">Colour</td>
                                <td class="tc">Comment</td>
                                <td class="tc">Score</td>
                            </tr>
                            @foreach($match->goals as $g)
                                <tr>
                                    <td class="tc">1</td>
                                    <td class="tc">{{$g->player->name}}</td>
                                    <td class="tc">
                                        @if($g->team_id == $match->home->id)
                                            W
                                        @else
                                            B
                                        @endif
                                    </td>
                                    <td class="tc"></td>
                                    <td class="tc">{{$g->score_home . ' - ' . $g->score_visitor }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @if($loop->iteration == 30)
                                        @break
                                    @endif

                                    @if($loop->last && $loop->count < 30)
                                        </tr>
                                        @for($i = $loop->count; $i < 31; $i++)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                        @endfor
                                    @endif

                                    @if($loop->last)
                                        </tr>
                                    @endif
                            @endforeach

                        </table>

                    </td>

                    {{--<!-- Rechterkant -->--}}
                    {{--<td>--}}
                        {{--<table>--}}
                            {{--<tr>--}}
                                {{----}}
                            {{--</tr>--}}
                            {{--@for ($i = 1; $i < 48; $i++)--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                            {{--@endfor--}}
                        {{--</table>--}}
                    {{--</td>--}}
                </tr>
            </table>
        </td>

        <!-- LEFT -->
        <td width="30%"  style="border: 0px;">
            <div class="sides">
                <!-- Table A1 -->
                <table class="fw noborder">
                    <tr>
                        <td style="text-align: center;"><h2 style="color: grey;">GAME OFFICIALS</h2></td>
                        <td style="text-align: right;"><img src="images/logo/kbzblogo.jpg" width="50px" /></td>

                    </tr>
                    <tr>
                        <td><b>REFEREES</b></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td><b>SECRETARIES</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>TIMEKEEPERS</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>GOAL JUDGES</b></td>
                        <td></td>
                    </tr>
                </table>

                <!-- Table A2-->
                <div style="text-align: center;">
                    <h1>Blue Caps</h1>
                </div>

                <table class="fw">
                    <tr>
                        <td>TEAM</td>
                        <td>{{$match->visitor->name}}</td>
                    </tr>
                    <tr>
                        <td>
                            Coach:
                        </td>
                        <td>{{$match->visitor->coach->name}}</td>
                    </tr>
                    <tr>
                        <td>Assistent coach 1:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Assistent coach 2:</td>
                        <td></td>
                    </tr>
                </table>

                <!-- Table A3 -->
                <table class="" style="width: 97%; border: 0px;">
                    <tr>
                        <td class="tc">NA</td>
                        <td class="tc">Player</td>
                        <td style="width: 20%" class="tc" colspan="3">Major fouls</td>
                        <td>
                            <table class="fw noborder">
                                <tr>
                                    <td class="tc" colspan="5">Goals by quarter</td>
                                </tr>
                                <tr>
                                    <td class="tc">1</td>
                                    <td class="tc">2</td>
                                    <td class="tc">3</td>
                                    <td class="tc">4</td>
                                    <td class="tc">PSO</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fouten -->
                    @foreach($match->visitor->players as $p)

                        <tr>
                            <td class="tc">{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td colspan="3">
                                <table class="fw noborder">
                                    <tr>
                                        @foreach($foutenBezoeker as $m)
                                            <!-- als overeenkomt, gemaakte fouten overlopen -->

                                            @if($loop->iteration < 4)

                                                @if($m->player_id == $p->id)

                                                        @for($i = 0; $i < $m->aantalfouten; $i++)
                                                            @if($i < 3)
                                                                <td class="tc">X</td>
                                                            @endif
                                                        @endfor

                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="fw">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!-- Table A4 -->
                <table class="fw">
                    <tr>
                        <td class="tc">RESULT</td>
                        <td class="tc">1</td>
                        <td class="tc">2</td>
                        <td class="tc">3</td>
                        <td class="tc">4</td>
                        <td class="tc">PSO</td>
                        <td class="tc">TOTAL</td>
                        <td colspan="4">TIMEOUT</td>
                    </tr>
                    <tr>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc">1</td>
                        <td class="tc">2</td>
                        <td class="tc">3</td>
                        <td class="tc">4</td>
                    </tr>
                    <tr>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                        <td class="tc"></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>

<table>

</body>
</html>