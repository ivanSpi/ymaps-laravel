<template>
<div id="map" class="map" @click="getCoordinates">
</div>
</template>

<script>
  export default {
    data() {
        return {
            map: null,
            point: null
        }
    },
    created() {
        ymaps.ready(this.initMap)
    },


    methods: {
        initMap() {
            this.map = new ymaps.Map('map', {
                center: [56.0,35.0],
                zoom: 6
            })
        },
        getCoordinates() {
            console.log(this.map.get('coords'))
        }
    }
  }
</script>