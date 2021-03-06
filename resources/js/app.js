/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import router from './routes'
import App from './views/App'

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.mixin({
    computed: {
        app() {
            return window.App
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    components: { App }
});
