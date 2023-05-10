
import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import appComponent from './components/AppComponent.vue'
import YmapPlugin from 'vue-yandex-maps'
const settings = {
    apiKey: '', // Индивидуальный ключ API
    lang: 'ru_RU', // Используемый язык
    coordorder: 'latlong', // Порядок задания географических координат
    debug: false, // Режим отладки
    version: '2.1' // Версия Я.Карт
  }
  
const app = createApp({});


app.component('app-component', appComponent)

app.use(YmapPlugin, settings)
app.use(router)

app.mount('#app');
