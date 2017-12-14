<template>
    <div>
        <div v-for="t in datastandings" class="row">
            <div class="col-sm-9">
                <a :href="'/teams/' + t.id">{{ t.name }}</a>
            </div>
            <div class="col-sm-3">
                {{ t.pivot.won * 3 + t.pivot.draw }}
            </div>
        </div>

    </div>
</template>
<script>

    export default {
        name: 'standings',
        props: ['standings', 'division_id', 'season_id'],
        components: {
        },
        data: function(){
            return {
                datastandings: this.standings,
                datadivisionid: this.division_id,
                dataseasonid: this.season_id,
            }
        },
        mounted: function() {
            "use strict";
        },
        created () {
            setInterval(function () {
                this.loadData();

            }.bind(this), 10000);
        },
        methods: {
            loadData: function(){
                let self = this;
                //console.log("bus catch");
                // Goal scored, let's get our topscorers
                axios.get('/api/divisions/'+ this.datadivisionid + '/standings/' + this.dataseasonid)
                    .then(
                        response => {
                            self.datastandings = (response.data);
                        }
                    );
            }
        },
    }

</script>