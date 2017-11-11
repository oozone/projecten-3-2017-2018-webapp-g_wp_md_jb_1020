
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.moment = require('moment');
//require('moment-timezone');
//require('moment/locale/nl-nl'); // locales all in lower-case
//window.moment.locale();         // nl-be

window.Vue = require('vue');
Vue.use(require('vue-moment'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('match', require('./components/Match.vue'));
Vue.component('matchlist', require('./components/MatchList.vue'));

const app = new Vue({
    el: '#app',
    data: {

    },
});
