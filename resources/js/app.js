/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('./shrink-navbar')

window.Vue = require('vue').default
Vue.component('Badge', require('./components/Badge.vue').default)
Vue.component('Form', require('./components/Form.vue').default)
Vue.component('Navbar', require('./components/Navbar.vue').default)

Vue.component('character-profile', require('./components/CharacterProfile.vue').default)
Vue.component('landing-page', require('./components/LandingPage.vue').default)

new Vue({ el: '#app' })
