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
            path: '/AsignarDocente',
            name: 'Asignardoc',
            component: require('./views/DocenteComponent.vue').default

        },

        {
            path: '/AsignarEstudiante',
            name: 'Asignarest',
            component: require('./views/EstudianteComponent.vue').default

        },

        {
            path: '/AsignarAdministrativos',
            name: 'Asignaradm',
            component: require('./views/AdministrativoComponent.vue').default

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


    ],
    mode: 'history'

})