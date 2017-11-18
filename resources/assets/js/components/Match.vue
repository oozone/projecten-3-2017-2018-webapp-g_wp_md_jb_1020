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
                                    <img :src="datamatch.home.logo" width="50px" />
                                </div>
                            {{ datamatch.home.name }}

                            </div>
                            <div class="col-sm-4">
                                <div style="font-size: 32px; padding-top: 16px;">{{datamatch.score_home}} - {{datamatch.score_visitor}}</div>
                            </div>
                            <div class="col-sm-4" style="padding-top: 25px;">
                                <div class="teamlogo" v-if="datamatch.visitor.logo != ''">
                                    <img :src="datamatch.visitor.logo" width="50px" />
                                </div>
                                {{ datamatch.visitor.name }}

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{location }}: {{ datamatch.location.name }}
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
                            <div class="row" v-for="goal in datamatch.goals">

                                <div class="row" v-if="goal.team_id == match.home.id">
                                    <div class="col-sm-6 col-xs-12 wp-goal-home">
                                        {{ goal.player.player_number }} {{ goal.player.name }} <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 col-xs-12 wp-goal-visitor">
                                        <i class="fa fa-futbol-o" aria-hidden="true"></i> {{ goal.player.player_number }} {{ goal.player.name }}
                                    </div>
                                </div>


                            </div>
                    </div>
                </div>


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
                                    {{ player.name }}
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
                                    {{ player.name }}
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
    export default {
        name: 'match',
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
                overzichtmatchen: "Matchlist"
            }
        },
        created () {
            this.setLocale();
            this.loadData();

            setInterval(function () {
                this.loadData();
            }.bind(this), 10000);
        },
        methods: {
            setLocale(){
                if(window.location.pathname.split('/')[1] == 'nl'){
                    this.matchverloop = 'Match detail';
                    this.location = 'Locatie';
                    this.overzichtmatchen = "Overzicht matchen";
                } else if(window.location.pathname.split('/')[1] == 'fr'){
                    this.matchverloop = 'Détail du match';
                    this.location = 'Emplacement';
                    this.overzichtmatchen = "Aperçu des matchs";
                    this.coach = "Entraîneur";
                    this.teams = "Équipes";
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
                    .then(response => this.datamatch = (response.data));
            }
        },
    }

</script>