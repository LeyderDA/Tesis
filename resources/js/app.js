
require('./bootstrap');
import Vue from 'vue'



window.Vue = require('vue');

Vue.component('principal-v', require('./components/PrincipalComponent.vue').default);

Vue.component('example-component', require('./views/ExampleComponent.vue').default);
Vue.component('area-v', require('./views/AreaComponent.vue').default);
Vue.component('persona-v', require('./views/PersonaComponent.vue').default);
Vue.component('user-v', require('./views/UserComponent.vue').default);
Vue.component('docente-v', require('./views/DocenteComponent.vue').default);
Vue.component('estudiante-v', require('./views/EstudianteComponent.vue').default);
Vue.component('administrativo-v', require('./views/AdministrativoComponent.vue').default);
Vue.component('recepcion-v', require('./views/RecepcionComponent.vue').default);
Vue.component('reclamante-v', require('./views/ReclamanteComponent.vue').default);
Vue.component('gestion-v', require('./views/GestionComponent.vue').default);

   
import router  from './routes'


const app = new Vue({
    el: '#app',
    router
});
