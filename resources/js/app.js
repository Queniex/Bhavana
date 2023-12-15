import Vue from 'vue'
import VueRouter from 'vue-router'
// require('./tailwind');
// require('admin-lte');

window.Vue = require('vue').default;
Vue.use(VueRouter)
Vue.component('landingpage', require('./components/LandingPage.vue').default);

export const routes = [
    // Admin
    { path: '/admin', redirect: '/Dash' },
    // { path: '/Dash', component: require('./components/Admin/Dashboard.vue').default },
    { path: '/Profile', component: require('./components/Admin/Profile.vue').default },
    { path: '/Profile-Change', component: require('./components/Admin/Profile-Change.vue').default },
    { path: '/Dash', component: require('./components/Admin/Dash.vue').default },
    { path: '/Product', component: require('./components/Admin/DataProduct.vue').default },
    { path: '/Category', component: require('./components/Admin/DataCategory.vue').default },
    { path: '/Contract', component: require('./components/Admin/Contract.vue').default },
    { path: '/Selling', component: require('./components/Admin/Selling.vue').default },
    { path: '/Buying', component: require('./components/Admin/Buying.vue').default },
    { path: '/User', component: require('./components/Admin/DataUser.vue').default },
    { path: '/Request', component: require('./components/Admin/DataRequest.vue').default },

    // Supplier
    { path: '/supplier', redirect: '/Dash-Sup' },
    { path: '/Dash-Sup', component: require('./components/Supplier/Dash-Sup.vue').default },
    { path: '/Profile-Sup', component: require('./components/Supplier/Profile-Sup.vue').default },
    { path: '/Profile-Change-Sup', component: require('./components/Supplier/Profile-Change-Sup.vue').default },
    { path: '/Inventory', component: require('./components/Supplier/Inventory.vue').default },
    { path: '/Contract-Sup', component: require('./components/Supplier/Contract-Sup.vue').default },
    { path: '/Selling-Sup', component: require('./components/Supplier/Selling-Sup.vue').default },

    // Buyer
    { path: '/buyer', redirect: '/Dash-Buy' },
    { path: '/Dash-Buy', component: require('./components/Buyer/Dash-Buy.vue').default },
    { path: '/Profile-Buy', component: require('./components/Buyer/Profile-Buy.vue').default },
    { path: '/Catalogue', component: require('./components/Buyer/Catalogue.vue').default },
    { path: '/Catalogue-Detail', component: require('./components/Buyer/CatalogueDetail.vue').default },
    { path: '/Contract-Buy', component: require('./components/Buyer/Contract.vue').default },
    { path: '/Transaction-Information', component: require('./components/Buyer/Transaction-01.vue').default },
    { path: '/Transaction-Order', component: require('./components/Buyer/Transaction-02.vue').default },

];

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
