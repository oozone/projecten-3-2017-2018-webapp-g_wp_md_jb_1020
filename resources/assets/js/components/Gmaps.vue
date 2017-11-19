<template>
<div id="map" style="width: 100%; height: 400px;"></div>
</template>

<script>
    export default {
        name: 'gmaps',
        props: ['location'],
        mounted() {
            console.log('Component mounted.');
            this.createMap();
        },
        create() {

        },

        methods: {
            createMap: function(){
                new google.maps.Geocoder().geocode({ address: this.location.street + ' ' + this.location.postalcode + ' ' + this.location.city }, function(results, status) {
                    if(status === google.maps.GeocoderStatus.OK) {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: results[0].geometry.location,
                            zoom: 16
                        });
                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            title: this.location.name
                        });
                    }
                });
            }
        }
    }
</script>
