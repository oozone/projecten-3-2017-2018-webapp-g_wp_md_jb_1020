<template>
    <div>



                            <div class="row row-matchlist" v-for="match in divisions" v-on:click="clickList(match.id)">

                                <div class="col-xs-10 col-md-2" style="text-align: center;"><div class="wppdate">{{ match.datum | moment("DD-MM-YYYY")  }}</div></div>
                                <div class="col-xs-2 col-md-2">{{ match.datum | moment("HH:mm") }}</div>
                                <div class="col-xs-4 col-md-2" style="vertical-align: middle; text-align: right">{{match.home.name}}</div>
                                <div class="col-xs-4 col-md-2" style="text-align: center;">{{match.score_home}} - {{match.score_visitor}}</div>
                                <div class="col-xs-4 col-md-2">{{match.visitor.name}}</div>
                                <div class="col-xs-12 col-md-2"><div class="live">{{ live }}</div></div>

                                <!--<td><a href="/matches/{{$match->id}}">Bekijk</a></td>-->
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
        data: function(){
            return {
                live: "LIVE",
            }
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
            this.setLocale();
        },
        methods: {
            setLocale(){
                if(window.location.pathname.split('/')[1] == 'nl'){

                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    this.live = "EN DIRECT";
                }
            },
            clickList: function (matchId) {
                if(window.location.pathname.split('/')[1] == 'nl'){
                    window.location.href = '/nl/matches/' + matchId;
                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    window.location.href = '/fr/matches/' + matchId;
                } else {
                    window.location.href = '/matches/' + matchId;
                }

            }
        },
    }

</script>