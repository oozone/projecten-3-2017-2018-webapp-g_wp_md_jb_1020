<template>
    <div>
        <div v-for="t in datastandings" class="row">
            <div class="col-sm-9">
                {{ t.name }}
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
        props: ['standings'],
        components: {
        },
        data: function(){
            return {
                datastandings: this.standings,
            }
        },
        mounted: function() {
            "use strict";
        },
        created () {
        },
        methods: {

        },
    }

</script>