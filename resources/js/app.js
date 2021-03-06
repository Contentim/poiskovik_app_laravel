/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
Vue.mixin(require('./asset'));

import EditorJS from '@editorjs/editorjs'
window.EditorJS = EditorJS
var htmlToImage = require('html-to-image');

import store from './store'

// import * as mutations from './store/mutation-types'
// import * as actions from './store/action-types'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('horizontal-sidebar', require('./components/HorizontalSidebar.vue').default);
Vue.component('vertical-sidebar', require('./components/VerticalSidebar.vue').default);
Vue.component('site-header', require('./components/Header.vue').default);
Vue.component('horizontal', require('./components/Horizontal.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('horizontal-body', require('./components/HorizontalBody.vue').default);
Vue.component('vertical', require('./components/Vertical.vue').default);
Vue.component('vertical-body', require('./components/VerticalBody.vue').default);
Vue.component('site-main', require('./components/Main.vue').default);

Vue.component('label-component', require('./components/LabelComponent.vue').default);
Vue.component('label-sidebar', require('./components/LabelSidebar.vue').default);
Vue.component('label-body', require('./components/LabelBody.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
**/

const app = new Vue({
    el: '#app',
    store,
    // router
});
