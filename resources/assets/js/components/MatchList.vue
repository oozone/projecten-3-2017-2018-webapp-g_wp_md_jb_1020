<template>
    <div>

        <div v-for="division in divisions" class="panel panel-matchlist">
            <div class="panel-heading">{{division.name}}</div>
            <div class="panel-body">

                    <div class="table-matchlist">

                            <div class="row row-matchlist" v-for="match in division.matches" v-on:click="clickList(match.id)">

                                <div class="col-xs-10 col-md-2" style="text-align: center;"><div class="wppdate">{{ match.datum | moment("DD-MM-YYYY")  }}</div></div>
                                <div class="col-xs-2 col-md-2">{{ match.datum | moment("HH:mm") }}</div>
                                <div class="col-xs-4 col-md-2" style="vertical-align: middle; text-align: right">{{match.home.name}}</div>
                                <div class="col-xs-4 col-md-2" style="text-align: center;">{{match.score_home}} - {{match.score_visitor}}</div>
                                <div class="col-xs-4 col-md-2">{{match.visitor.name}}</div>
                                <div class="col-xs-12 col-md-2"><div class="live">LIVE</div></div>

                                <!--<td><a href="/matches/{{$match->id}}">Bekijk</a></td>-->
                            </div>

                </div>
            </div>
        </div>

    </div>
</template>
<script>


    export default {
        name: 'matchlist',
        props: ['divisions'],
        components: {
            //'starrating': starrating,
        },
        mounted: function() {
            "use strict";
//            $("table.table-matchlist > tbody > tr").click(function() {
//                //$(this)
//                window.location.href = '/matches/' + $(this).attr("data-urlid");
//                //get <td> element values here!!??
//            });
        },
        created () {
        },
        methods: {
            clickList: function (matchId) {
                window.location.href = '/matches/' + matchId;
            }
        },
    }

</script>