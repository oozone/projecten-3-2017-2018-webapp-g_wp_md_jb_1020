<template>
    <div>
        <button type="button" class="btn btn-default" v-on:click="goHome()">Overzicht matchen</button>
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
                                {{match.home.competition_class}}
                            </div>
                            <div class="col-sm-4" style="padding-top: 25px;">
                            {{ match.home.name }}
                            </div>
                            <div class="col-sm-4">
                                <span style="font-size: 32px">{{match.score_home}} - {{match.score_visitor}}</span>
                            </div>
                            <div class="col-sm-4" style="padding-top: 25px;">
                                {{ match.visitor.name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                Locatie: {{ match.location.name }}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Match details -->
                <div class="panel panel-matchlist">
                    <div class="panel-heading text-center">
                        Matchverloop
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                            <div class="row" v-for="goal in match.goals">

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
                        Teams
                    </div>
                    <div class="panel-body">
                        <!-- home -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    <b>{{ match.home.name }}</b>
                                </div>
                            </div>
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    Coach: {{ match.home.coach.name }}
                                </div>
                            </div>
                            <div class="row" v-for="player in match.home.players">
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
                                    <b>{{ match.visitor.name }}</b>
                                </div>
                            </div>
                            <div class="row coach-row">
                                <div class="col-sm-12">
                                    Coach: {{ match.visitor.coach.name }}
                                </div>
                            </div>
                            <div class="row" v-for="player in match.visitor.players">
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
            //'starrating': starrating,
        },
        mounted: function() {
            "use strict";
        },
        created () {
        },
        methods: {
            goHome: function () {
                window.location.href = '/';
            }
        }
    }

</script>