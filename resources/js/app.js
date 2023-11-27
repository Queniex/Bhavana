import Vue from 'vue'
import VueRouter from 'vue-router'
// require('./tailwind');
// require('admin-lte');

window.Vue = require('vue').default;
Vue.use(VueRouter)
Vue.component('landingpage', require('./components/LandingPage.vue').default);

export const routes = [
    // Admin
    { path: '/admin', redirect: '/Dashboard' },
    { path: '/Dashboard', component: require('./components/Admin/Dashboard.vue').default },
    { path: '/Profile', component: require('./components/Admin/Profile.vue').default },
    { path: '/Product', component: require('./components/Admin/DataProduct.vue').default },
    { path: '/Category', component: require('./components/Admin/DataCategory.vue').default },
    { path: '/Contract', component: require('./components/Admin/Contract.vue').default },
    { path: '/Selling', component: require('./components/Admin/Selling.vue').default },
    { path: '/Buying', component: require('./components/Admin/Buying.vue').default },
    { path: '/User', component: require('./components/Admin/DataUser.vue').default },
    { path: '/Request', component: require('./components/Admin/DataRequest.vue').default },

    // Supplier
    { path: '/supplier', redirect: '/Dashboard' },
    { path: '/Dashboard', component: require('./components/Supplier/Dashboard.vue').default },
    // { path: '/Profile', component: require('./components/Supplier/Profile.vue').default },
    // { path: '/Product', component: require('./components/Supplier/DataProduct.vue').default },
    // { path: '/Category', component: require('./components/Supplier/DataCategory.vue').default },
    // { path: '/Contract', component: require('./components/Supplier/Contract.vue').default },
    // { path: '/Selling', component: require('./components/Supplier/Selling.vue').default },
    // { path: '/Buying', component: require('./components/Supplier/Buying.vue').default },
    // { path: '/User', component: require('./components/Supplier/DataUser.vue').default },
    // { path: '/Request', component: require('./components/Supplier/DataRequest.vue').default },
];

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
