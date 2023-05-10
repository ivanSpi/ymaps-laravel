<template>
    <YandexMap id="main_map" :settings="settings" :coordinates="[55,33]" @click="selectPoint">
        <YandexCollection v-if="points">
            <YandexMarker @click="selectMark(point.coord)" v-for="point in points" :coordinates="point.coord" :marker-id="`1-marker-222`"></YandexMarker>
        </YandexCollection>
    <YandexMarker v-if="currentCoordinates" :coordinates="currentCoordinates" :marker-id="123"></YandexMarker>
</YandexMap>

  </template>
  
  <script>
import { YandexMap, YandexMarker, YandexCollection } from 'vue-yandex-maps'

import { loadYmap } from 'vue-yandex-maps'

export default {
    name: 'Map',
    components: {
        YandexMap, YandexMarker, YandexCollection
    },
    data() {
        return {
            points: [],
            currentCoordinates: null,
            location: null,
            settings: {
                apiKey: 'ebb03979-afe5-486a-a1d3-3a34d598f19c', // Индивидуальный ключ API
                lang: 'ru_RU', // Используемый язык
                coordorder: 'latlong', // Порядок задания географических координат
                debug: false, // Режим отладки
                version: '2.1', // Версия Я.Карт
            }
        }
    },

    mounted() {

    },

    methods: {

        selectPoint(e) {

            this.currentCoordinates = e.get('coords')
            axios.get(`https://geocode-maps.yandex.ru/1.x?geocode=${e.get('coords').toString()}&apikey=${this.settings.apiKey}&format=json&sco=latlong&results=1`)
            .then(res => {

                let result = res.data.response.GeoObjectCollection.featureMember[0].GeoObject

                this.$parent.addLocationToMenu({point: result.Point.pos, name: result.name, description: result.description})
            })
        },


        addPlaceMark(point) {

            let mark = {
                coord: [point.split(' ')[1], point.split(' ')[0]]
            }
            this.points.push(mark);
        },

        hideMark(point) {

            let mark = {
                coord: [point.split(' ')[1], point.split(' ')[0]]
            }

            this.points = this.points.filter(item => JSON.stringify(item.coord) !== JSON.stringify(mark.coord))
        },

        selectMark(point) {
            
            this.$parent.$refs.menu.select(point)
        },

        removeMarks() {
            this.points = []
        }
    }
}
  </script>
  
  <style scoped>
.yandex-balloon {
  height: 200px;
  width: 200px;
}
.yandex-container {
    width: 100%;
    height: 100%;
}
  </style>