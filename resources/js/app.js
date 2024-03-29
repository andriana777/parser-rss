require('./bootstrap');

import Vue from 'vue';
import AdminPanel from './components/AdminPanel.vue';

Vue.component('admin-panel', AdminPanel);

const app = new Vue({
    el: '#app',
});
