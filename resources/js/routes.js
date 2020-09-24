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
            component: require('./views/SUPERrecepcionComponent.vue').default

        },

        {
            path: '/Gestion',
            name: 'gestion',
            component: require('./views/SUPERgestionComponent.vue').default

        },

        {
            path: '/Asignacion',
            name: 'asignacion',
            component: require('./views/AsignarRecepcionComponent.vue').default

        },

        {
            path: '/RecepEst',
            name: 'recepest',
            component: require('./views/RecepestComponent.vue').default

        },

        {
            path: '/RecepDoc',
            name: 'recepdoc',
            component: require('./views/recepDocenteComponent.vue').default

        },



        {
            path: '/DocGestion',
            name: 'gestdocente',
            component: require('./views/DOCgestionComponent.vue').default

        },

        {
            path: '/EstGestion',
            name: 'gestest',
            component: require('./views/gestionComponent.vue').default

        },

        {
            path: '/Notas',
            name: 'notas',
            component: require('./views/NotasComponent.vue').default

        },

        
        {
            path: '/Observaciones',
            name: 'observaciones',
            component: require('./views/ObservacionesComponent.vue').default

        },

        {
            path: '/MiUsuario',
            name: 'miusuario',
            component: require('./views/MiUsuarioComponent.vue').default

        },

        {
            path: '/Reportes',
            name: 'reportes',
            component: require('./views/ReportesComponent.vue').default

        },




        


    ],
    mode: 'history'

})