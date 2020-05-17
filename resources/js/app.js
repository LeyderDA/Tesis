
require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('area-v', require('./components/AreaComponent.vue').default);
Vue.component('persona-v', require('./components/PersonaComponent.vue').default);




const app = new Vue({
    el: '#app',
});
