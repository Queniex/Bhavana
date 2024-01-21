import Vue from 'vue'
import VueRouter from 'vue-router'
// require('./tailwind');
// require('admin-lte');

window.Vue = require('vue').default;
Vue.use(VueRouter)

// import Form from 'vform'
// window.Form = Form;
// import HasError from 'vform'
// import AlertError from 'vform'
// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)

Vue.component('landingpage', require('./components/LandingPage.vue').default);

import Form from 'vform'
window.Form = Form;
import HasError from 'vform'
import AlertError from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

let Fire = new Vue();
window.Fire = Fire;

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

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
    { path: '/Profile-Sup', name: 'Profile-Sup', component: require('./components/Supplier/Profile-Sup.vue').default },
    { path: '/Profile-Change-Sup', component: require('./components/Supplier/Profile-Change-Sup.vue').default },
    { path: '/Inventory', component: require('./components/Supplier/Inventory.vue').default },
    { path: '/Contract-Sup', name: 'Contract-Sup', component: require('./components/Supplier/Contract-Sup.vue').default },
    { path: '/Selling-Sup', component: require('./components/Supplier/Selling-Sup.vue').default },

    // Buyer
    { path: '/buyer', redirect: '/Dash-Buy' },
    { path: '/Dash-Buy', component: require('./components/Buyer/Dash-Buy.vue').default },
    { path: '/Profile-Buy', component: require('./components/Buyer/Profile-Buy.vue').default },
    { path: '/Catalogue', component: require('./components/Buyer/Catalogue.vue').default },
    {
        path: '/Detail-Contract', name: 'Detail-Contract', component: require('./components/Buyer/Detail-Contract.vue').default, props: true
    },
    // { path: '/Catalogue-Detail/:productId', component: require('./components/Buyer/CatalogueDetail.vue').default },
    {
        path: '/Catalogue-Detail', name: 'Catalogue-Detail', component: require('./components/Buyer/CatalogueDetail.vue').default, props: true
    },
    { path: '/Contract-Buy', name: 'Contract-Buy', component: require('./components/Buyer/Contract.vue').default },
    // { path: '/Transaction-Information', component: require('./components/Buyer/Transaction-01.vue').default },
    {
        path: '/Transaction-Information', name: 'Transaction-Information', component: require('./components/Buyer/Transaction-01.vue').default, props: true
    },
    {
        path: '/Transaction-Order', name: 'Transaction-Order', component: require('./components/Buyer/Transaction-02.vue').default, props: true
    },
];


const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior() {
        return { x: 0, y: 0 };
    }
})

const app = new Vue({
    el: '#app',
    router
});
