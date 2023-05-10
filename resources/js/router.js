import { createRouter, createWebHistory } from "vue-router";




export default new createRouter({

    history: createWebHistory(),
    routes: [
        {
            path: '/points', component: () => import('./components/Menu/PointComponent.vue'), name: 'point.current'
        },
    ]
})


