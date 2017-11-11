<template>
    <div>


        <div v-for="division in divisions" class="panel panel-default">
            <div class="panel-heading">{{division.name}}</div>
            <div class="panel-body">


                <div class="span5">
                    <table class="table table-condensed table-matchlist">

                        <tbody>


                            <tr v-for="match in division.matches" v-on:click="clickList(match.id)">

                                <td style="text-align: center; width: 15%;"><div class="wppdate">{{ match.datum | moment("DD-MM-YYYY")  }}</div></td>
                                <td>{{ match.datum | moment("HH:mm") }}</td>
                                <td style="text-align: right">{{match.home.name}}</td>
                                <td style="text-align: center;">{{match.score_home}} - {{match.score_visitor}}</td>
                                <td>{{match.visitor.name}}</td>

                                <!--<td><a href="/matches/{{$match->id}}">Bekijk</a></td>-->
                            </tr>


                        </tbody>
                    </table>
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