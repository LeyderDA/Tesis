import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)

export default new Router({
    routes: [
        {
            path:'/area',
            name: 'area',
            component:require('./views/AreaComponent.vue').default
        },
        {
            path: '/persona',
            name: 'persona',
            component: require('./views/PersonaComponent.vue').default
     
        },
    ],
    mode: 'history'

})