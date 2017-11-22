<template>
    <div>
        <button type="button" class="btn btn-default" v-on:click="goHome()">{{overzichtmatchen}}</button>
        <div class="row">
            <div class="col-sm-6 col-md-12">
                <div class="panel panel-matchdetail">
                    <div class="panel-heading">

                        <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body text-center">

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {{datamatch.home.division.name}}
                            </div>
                            <div class="col-sm-4" style="padding-top: 25px;">
                                <div class="teamlogo" v-if="datamatch.home.logo != ''">
                                    <a :href="'/teams/' + datamatch.home.id"><img :src="datamatch.home.logo" width="50px" /></a>
                                </div>
                                <a :href="'/teams/' + datamatch.home.id">{{ datamatch.home.name }}</a>
                                <br />
                                <span class="wppgoallive" id="goalhome" style="">
                                    GOAL
                                </span>

                            </div>
                            <div class="col-sm-4">
                                <div style="font-size: 32px; padding-top: 16px;">{{datamatch.score_home}} - {{datamatch.score_visitor}}</div>
                            </div>
                            <div class="col-sm-4" style="padding-top: 25px;">
                                <div class="teamlogo" v-if="datamatch.visitor.logo != ''">
                                    <a :href="'/teams/' + datamatch.visitor.id"><img :src="datamatch.visitor.logo" width="50px" /></a>
                                </div>
                                <a :href="'/teams/' + datamatch.visitor.id">{{ datamatch.visitor.name }}</a>
                                <br />
                                <span class="wppgoallive" id="goalvisitor" style="">
                                    GOAL
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{location }}: <a :href="'/locations/' + datamatch.location.id">{{ datamatch.location.name }}</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ matchverloop }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="row" v-for="item in datamatchdetail">

                            <div v-if="!item.penalties">
                                <!-- GOAL -->
                                <div class="row" v-if="item.team_id == match.home.id">
                                    <div class="col-sm-6 col-xs-12 wp-goal-home">

                                        {{ item.player.player_number }} {{ item.player.name }} <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                        <!--{{ moment.utc(moment(item.created_at,"YYYY-MM-DD HH:mm:ss").diff(moment(match.created_at,"YYYY-MM-DD HH:mm:ss"))).format("mm:ss")}}-->

                                        {{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 col-xs-12 wp-goal-visitor">
                                        {{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'
                                        <i class="fa fa-futbol-o" aria-hidden="true"></i> {{ item.player.player_number }} {{ item.player.name }}
                                    </div>
                                </div>
                            </div>
                            <div v-if="item.penalties">
                                <!-- PENALTY -->
                                <div class="row" v-if="item.player.team_id == match.home.id">
                                    <div class="col-sm-6 col-xs-12 wp-goal-home">

                                        {{ item.player.player_number }} {{ item.player.name }}

                                        <span class="wppenalty" v-if="item.penalties[0].penalty_type_id == 1">U20</span>
                                        <span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 2">UMV</span>
                                        <span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 3">UMV 4</span>

                                        {{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 col-xs-12 wp-goal-visitor">
                                        {{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'

                                        <span class="wppenalty" v-if="item.penalties[0].penalty_type_id == 1">U20</span>
                                        <span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 2">UMV</span>
                                        <span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 3">UMV 4</span>

                                        {{ item.player.player_number }} {{ item.player.name }}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ comments }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="row" v-for="comment in datacommentaries">
                            <div class="col-md-3 text-right">
                                {{ comment.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'
                            </div>
                            <div class="col-md-9">
                                {{ comment.text }}
                            </div>

                        </div>
                        <div class="row" v-if="isadmin != 0" style="margin-top: 20px;">
                            <div class="col-md-9">
                                <input v-model="acommentary" class="form-control" type="text">
                            </div>
                            <div class="col-md-3">
                                <button v-on:click="addCommentary()">Save</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!--&lt;!&ndash; Match details &ndash;&gt;-->
                <!--<div class="panel panel-matchlist">-->
                    <!--<div class="panel-heading text-center">-->
                        <!--{{ matchverloop }}-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--&lt;!&ndash; home &ndash;&gt;-->
                            <!--<div class="row" v-for="goal in datamatch.goals">-->

                                <!--<div class="row" v-if="goal.team_id == match.home.id">-->
                                    <!--<div class="col-sm-6 col-xs-12 wp-goal-home">-->

                                        <!--{{ goal.player.player_number }} {{ goal.player.name }} <i class="fa fa-futbol-o" aria-hidden="true"></i>-->
                                        <!--&lt;!&ndash;{{ moment.utc(moment(goal.created_at,"YYYY-MM-DD HH:mm:ss").diff(moment(match.created_at,"YYYY-MM-DD HH:mm:ss"))).format("mm:ss")}}&ndash;&gt;-->

                                        <!--{{ goal.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'-->
                                    <!--</div>-->
                                    <!--<div class="col-sm-6">-->

                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row" v-else>-->
                                    <!--<div class="col-sm-6">-->

                                    <!--</div>-->
                                    <!--<div class="col-sm-6 col-xs-12 wp-goal-visitor">-->
                                        <!--{{ goal.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'-->
                                        <!--<i class="fa fa-futbol-o" aria-hidden="true"></i> {{ goal.player.player_number }} {{ goal.player.name }}-->
                                    <!--</div>-->
                                <!--</div>-->


                            <!--</div>-->
                    <!--</div>-->
                <!--</div>-->




                <!--&lt;!&ndash; Match details &ndash;&gt;-->
                <!--<div class="panel panel-matchlist">-->
                    <!--<div class="panel-heading text-center">-->
                        <!--{{ fouten }}-->
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                        <!--&lt;!&ndash; home &ndash;&gt;-->
                        <!--<div class="row" v-for="item in datamatch.penaltybooks">-->

                            <!--<div class="row" v-if="item.player.team_id == match.home.id">-->
                                <!--<div class="col-sm-6 col-xs-12 wp-goal-home">-->

                                    <!--{{ item.player.player_number }} {{ item.player.name }}-->

                                            <!--<span class="wppenalty" v-if="item.penalties[0].penalty_type_id == 1">U20</span>-->
                                            <!--<span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 2">UMV</span>-->
                                            <!--<span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 3">UMV 4</span>-->

                                    <!--{{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'-->
                                <!--</div>-->
                                <!--<div class="col-sm-6">-->

                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row" v-else>-->
                                <!--<div class="col-sm-6">-->

                                <!--</div>-->
                                <!--<div class="col-sm-6 col-xs-12 wp-goal-visitor">-->
                                    <!--{{ item.created_at | moment("diff", match.created_at, "mm:ss") / 1000 }}'-->

                                    <!--<span class="wppenalty" v-if="item.penalties[0].penalty_type_id == 1">U20</span>-->
                                    <!--<span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 2">UMV</span>-->
                                    <!--<span class="wppenalty" v-else-if="item.penalties[0].penalty_type_id == 3">UMV 4</span>-->

                                    <!--{{ item.player.player_number }} {{ item.player.name }}-->
                                <!--</div>-->
                            <!--</div>-->


                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                

                <!-- Players -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        {{ teams }}
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    <b>{{ datamatch.home.name }}</b>
                                </div>
                            </div>
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    {{ coach }}: {{ datamatch.home.coach.name }}
                                </div>
                            </div>
                            <div class="row" v-for="player in datamatch.home.players">
                                <div class="col-sm-2 col-xs-2">
                                    {{ player.player_number }}
                                </div>
                                <div class="col-sm-10 col-xs-10">
                                    <a :href="'/players/' + player.id" class="playerprofilelink">{{ player.name }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- visitor -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    <b>{{ datamatch.visitor.name }}</b>
                                </div>
                            </div>
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    {{ coach }}: {{ datamatch.visitor.coach.name }}
                                </div>
                            </div>
                            <div class="row" v-for="player in datamatch.visitor.players">
                                <div class="col-sm-2 col-xs-2">
                                    {{ player.player_number }}
                                </div>
                                <div class="col-sm-10 col-xs-10">
                                    <a :href="'/players/' + player.id" class="playerprofilelink">{{ player.name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    //import moment from "moment";
    //import momentTimezone from "moment-timezone";
    //import VueMomentJS from "vue-momentjs";
    Vue.use(require('vue-moment'));
    //Vue.use(VueMomentJS, moment);
    import { bus } from './bus.js';
    //const Bus = new Vue({});

    export default {
        name: 'match',
        props: ['match','matchdetail','isadmin'],
        components: {
        },
        mounted: function() {
            "use strict";
        },
        data: function(){
            return {
                datamatch: this.match,
                datamatchdetail: this.matchdetail,
                datacommentaries: this.match.commentaries,
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
            }
        },
        created () {
            this.setLocale();
            axios.get('/api/matches/' + this.datamatch.id)
                .then(
                    response => {
                        this.datamatch = (response.data);
                        this.datamatchdetail = response.data.matchdetail;
                        this.datacommentaries = response.data.commentaries;
                        this.score_home = response.data.score_home;
                        this.score_visitor = response.data.score_visitor;
                    }
                );

            setInterval(function () {
                this.loadData();

            }.bind(this), 10000);
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
                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    this.matchverloop = 'Détail du match';
                    this.location = 'Emplacement';
                    this.overzichtmatchen = "Aperçu des matchs";
                    this.coach = "Entraîneur";
                    this.teams = "Équipes";
                    this.fouten = "Fautes";
                    this.comments = "Commentaire";
                }
            },
            goHome: function () {

                if(window.location.pathname.split('/')[1] == 'nl'){
                    window.location.href = '/nl/';
                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    window.location.href = '/fr/';
                } else {
                    window.location.href = '/';
                }


            },
            loadData: function () {
                axios.get('/api/matches/' + this.datamatch.id)
                    .then(
                        response => {
                            this.datamatch = (response.data);
                            this.datamatchdetail = response.data.matchdetail;
                            this.datacommentaries = response.data.commentaries;
                            this.checkGoals();
                        }
                    );
            },
            checkGoals: function(){
                if(this.datamatch.score_home > this.score_home){
                    $("#goalhome").show().delay(10000).fadeOut();
                    this.score_home = this.datamatch.score_home;
                    bus.$emit('goalScored');
                } else if(this.datamatch.score_visitor > this.score_visitor){
                    $("#goalvisitor").show().delay(10000).fadeOut();
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
            addCommentary: function(){
                let self = this;
                axios.put('/api/matches/' + this.datamatch.id + '/comment', {
                    comment: self.acommentary
                },{'headers':{'Content-Type': 'application/json'}} )
                .then(
                    self.acommentary = ""
                );
            }
        },
    }

</script>