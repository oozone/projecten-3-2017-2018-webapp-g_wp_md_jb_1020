
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.moment = require('moment');

//require('moment/locale/nl-nl'); // locales all in lower-case
//window.moment.locale();         // nl-be

window.Vue = require('vue');
window.axios = require('axios');

//window.Lang = require('vuejs-localization');

//Notice that you need to specify the lang folder, in this case './lang'
//Lang.requireAll(require.context('./lang', true, /\.js$/));

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.config.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

//Vue.use(require('vue-moment'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



Vue.component('match', require('./components/Match.vue'));
Vue.component('scoreboard', require('./components/admin/Scoreboard.vue'));
Vue.component('matchlist', require('./components/MatchList.vue'));
Vue.component('topscorers', require('./components/Topscorers.vue'));
Vue.component('standings', require('./components/Standings.vue'));
Vue.component('gmaps', require('./components/Gmaps.vue'));

const app = new Vue({
    el: '#app',
    data: {

    },
});
