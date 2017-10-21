<template>
    <div>
        <div class="row">
            <div class="col-sm-6 col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw ti-comment-alt"></i> Match
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body text-center">
                        <div class="row">
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
                        <br />

                        Locatie: {{ match.location.street }}, {{ match.location.postalcode }} {{ match.location.city }}
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

        }
    }

</script>