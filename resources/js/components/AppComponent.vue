<template>
    <div class="app d-flex">
        <MapComponent ref="map_component" class="map"></MapComponent>
        <MenuComponent ref="menu" class="menu"></MenuComponent>
    </div>
  </template>
  
  <script>
import MapComponent from './MapComponent.vue'
import MenuComponent from './MenuComponent.vue';
//import NewMapComponent from './NewMapComponent.vue';


export default {
    name: 'App',
    components: {
        MapComponent, MenuComponent
    },

    data() {
        return {

        }
    },

    methods: {
        onClickedMap(coord) {
            this.$refs.menu.point = coord;
        },

        addLocationToMenu(location) {

            this.$refs.menu.location = location
        }
    }

}
  </script>
  
  <style scoped>

  .app {
    width: 100%;
    height: 100vh;
  }

  .map {
    flex: 9
  }
  .menu {
    flex: 3
  }
  
 
  </style>