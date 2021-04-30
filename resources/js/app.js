/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const login = new Vue({
    el: '#login',
    data: {
        characters: [
            {
                name: 'Iraldin',
                server: 'Uldaman',
                region: 'EU'
            },
            {
                name: 'Lincce',
                server: 'Drek\'thar',
                region: 'EU'
            },
            {
                name: 'Nil',
                server: 'Drek\'thar',
                region: 'EU'
            }
        ],
        test: 'test'
    }
});
