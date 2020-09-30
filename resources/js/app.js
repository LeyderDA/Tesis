
require('./bootstrap');
import Vue from 'vue'




window.Vue = require('vue');

Vue.component('principal-v', require('./components/PrincipalComponent.vue').default);
Vue.component('example-component', require('./views/ExampleComponent.vue').default);
Vue.component('area-v', require('./views/AreaComponent.vue').default);
Vue.component('persona-v', require('./views/PersonaComponent.vue').default);
Vue.component('personavista-v', require('./views/PersonavistaComponent.vue').default);
Vue.component('user-v', require('./views/UserComponent.vue').default);
Vue.component('uservista-v', require('./views/UservistaComponent.vue').default);
Vue.component('asignarrecep-v', require('./views/AsignarRecepcionComponent').default);
Vue.component('asignarrecepvista-v', require('./views/AsignarRecepcionvistaComponent').default);
Vue.component('reclamante-v', require('./views/ReclamanteComponent.vue').default);
Vue.component('reclamantevista-v', require('./views/ReclamantevistaComponent.vue').default);
Vue.component('gestion-v', require('./views/GestionComponent.vue').default);
Vue.component('opcionesest-v', require('./views/OpcionesEstudiantes.vue').default);
Vue.component('opcionesadmin-v', require('./views/OpcionesAdministrativo.vue').default);
Vue.component('opcionesdoc-v', require('./views/OpcionesDocentes.vue').default);
Vue.component('asignar-v', require('./views/AsignarRecepcionComponent.vue').default);
Vue.component('recepest-v', require('./views/RecepestComponent.vue').default);
Vue.component('recepdoc-v', require('./views/recepDocenteComponent.vue').default);
Vue.component('notas-v', require('./views/NotasComponent.vue').default);
Vue.component('miusario-v', require('./views/MiUsuarioComponent.vue').default);
Vue.component('reportes-v', require('./views/ReportesComponent.vue').default);
Vue.component('vistaReSuper-v', require('./views/SUPERrecepcionvistaComponent.vue').default);
import router  from './routes'

//lo del codigo qr
import VueQRCodeComponent from 'vue-qrcode-component'
Vue.component('qr-code', VueQRCodeComponent)
//lo del codigo qr


const app = new Vue({
    el: '#app',
    router
});
