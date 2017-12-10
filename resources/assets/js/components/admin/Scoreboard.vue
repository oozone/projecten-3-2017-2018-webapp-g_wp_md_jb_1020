<template>
    <div>
            <div class="col-sm-12 col-md-12">
                <div class="panel-scoreboard ">
                    <div class="panel-body text-center panel vertical-center">

                        <div class="row text-center" style="margin:0 auto;">
                            <div class="col-sm-4" style="">
                                <div class="teamlogo" v-if="datamatch.home.logo != ''">
                                    <img :src="datamatch.home.logo" class="img-responsive" />
                                </div>
                                <h2>{{ datamatch.home.name }}</h2>
                                <br />
                                <div >
                                    <span class="wppgoallive" id="goalhome" style="">
                                        GOAL
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div v-if="match.cancelled != 1"><h1>{{datamatch.score_home}} - {{datamatch.score_visitor}}</h1></div>
                                <div style="" v-else><h1>{{ cancelled }}</h1></div>
                            </div>
                            <div class="col-sm-4" style="">
                                <div class="teamlogo" v-if="datamatch.visitor.logo != ''">
                                    <img :src="datamatch.visitor.logo"  class="img-responsive" />
                                </div>
                                <h2>{{ datamatch.visitor.name }}</h2>
                                <br />
                                <div style="">
                                    <span class="wppgoallive" id="goalvisitor" style="">
                                    GOAL
                                </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </div>
</template>
<script>
    import { bus } from '../bus.js';
    import round from 'vue-round-filter';
    Vue.use(require('vue-moment'));

    export default {
        name: 'scoreboard',
        props: ['match'],
        components: {
        },
        mounted: function() {
            "use strict";
        },
        data: function(){
            return {
                datamatch: this.match,
                matchverloop: "Match detail",
                location: "Location",
                teams: "Teams",
                coach: "Coach",
                overzichtmatchen: "Matchlist",
                score_home: 0,
                score_visitor: 0,
                fouten: "Penalties",
                acommentary: "",
                comments: "Commentary",
                cancelled: "CANCELLED"
            }
        },
        created () {
            this.setLocale();
            axios.get('/api/matches/' + this.datamatch.id)
                .then(
                    response => {
                        this.datamatch = (response.data);
                        this.score_home = response.data.score_home;
                        this.score_visitor = response.data.score_visitor;
                    }
                );

            setInterval(function () {
                this.loadData();

            }.bind(this), 10000);
        },
        filters: {
            round,
        },
        methods: {
            moment: function () {
                return moment();
            },
            setLocale(){
                if(window.location.pathname.split('/')[1] == 'nl'){
                    this.matchverloop = 'Match detail';
                    this.location = 'Locatie';
                    this.overzichtmatchen = "Overzicht matchen";
                    this.fouten = "Fouten";
                    this.comments = "Commentaar";
                    this.cancelled = "AFGELAST";
                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    this.matchverloop = 'Détail du match';
                    this.location = 'Emplacement';
                    this.overzichtmatchen = "Aperçu des matchs";
                    this.coach = "Entraîneur";
                    this.teams = "Équipes";
                    this.fouten = "Fautes";
                    this.comments = "Commentaire";
                    this.cancelled = "ANNULÉ";
                }
            },
            loadData: function () {
                axios.get('/api/matches/' + this.datamatch.id)
                    .then(
                        response => {
                            this.datamatch = (response.data);
                            this.checkGoals();
                        }
                    );
            },
            checkGoals: function(){
                if(this.datamatch.score_home > this.score_home){
                    $("#goalhome").show().delay(20000).fadeOut();
                    this.score_home = this.datamatch.score_home;
                    bus.$emit('goalScored');
                } else if(this.datamatch.score_visitor > this.score_visitor){
                    $("#goalvisitor").show().delay(20000).fadeOut();
                    this.score_visitor = this.datamatch.score_visitor;
                    bus.$emit('goalScored', true);
                }
            },
            getPenaltyType: function(penaltyType){
                switch(penaltyType) {
                    case 1: return "U20"; break;
                    case 2: return "UMV"; break;
                    case 3: return "UMV4"; break;
                }
            },
        },
    }

</script>