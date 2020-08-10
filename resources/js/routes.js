import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/area',
            name: 'area',
            component: require('./views/AreaComponent.vue').default
        },
        {
            path: '/persona',
            name: 'persona',
            component: require('./views/PersonaComponent.vue').default

        },

        {
            path: '/Usuario',
            name: 'usuario',
            component: require('./views/UserComponent.vue').default

        },
  

        {
            path: '/Reclamante',
            name: 'reclamante',
            component: require('./views/ReclamanteComponent.vue').default

        },

        {
            path: '/Recepcion',
            name: 'recepcion',
            component: require('./views/RecepcionComponent.vue').default

        },

        {
            path: '/Gestion',
            name: 'gestion',
            component: require('./views/GestionComponent.vue').default

        },

        {
            path: '/Asignacion',
            name: 'asignacion',
            component: require('./views/AsignarRecepcionComponent.vue').default

        },

        


    ],
    mode: 'history'

})