
require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('area-v', require('./components/AreaComponent.vue').default);
Vue.component('persona-v', require('./components/PersonaComponent.vue').default);
Vue.component('user-v', require('./components/UserComponent.vue').default);
Vue.component('docente-v', require('./components/DocenteComponent.vue').default);
Vue.component('estudiante-v', require('./components/EstudianteComponent.vue').default);
Vue.component('administrativo-v', require('./components/AdministrativoComponent.vue').default);
Vue.component('recepcion-v', require('./components/RecepcionComponent.vue').default);
Vue.component('reclamante-v', require('./components/ReclamanteComponent.vue').default);




const app = new Vue({
    el: '#app',
});
