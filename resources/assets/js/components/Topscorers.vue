<template>
    <div>
        <div v-for="s in datatopscorers" class="row">
            <div class="col-sm-9">
                {{ s.name }}
            </div>
            <div class="col-sm-3">
                {{ s.goalscore }}
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        name: 'topscorers',
        props: ['topscorers'],
        components: {
        },
        data: function(){
            return {
                datatopscorers: this.topscorers,
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