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

//    import bus from 'bus.js';
import { bus } from './bus.js';
    export default {
        name: 'topscorers',
        props: ['topscorers','division_id'],
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
            let self = this;
            bus.$on('goalScored', function(data) {

                //console.log("bus catch");
                // Goal scored, let's get our topscorers
                axios.get('/api/divisions/'+ self.division_id + '/topscorers')
                    .then(
                        response => {
                            self.datatopscorers = (response.data);
                        }
                    );
            });


        },
        methods: {

        },
    }

</script>