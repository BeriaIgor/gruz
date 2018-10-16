import Vue from './../../node_modules/vue/dist/vue.js';
import PanelSearch from './components/PanelSearch.vue';

const app = new Vue({
    el: '#app',
    components: {
        'panel-search': PanelSearch
    }
});
