require('./bootstrap');

import Vue from 'vue'
import router from './router'
import common from './common'

import FooterPart from './components/template/footer.vue'
import NavbarPart from './components/template/navbar.vue'
import SidebarPart from './components/template/sidebar.vue'

// Sweet Alert

import swal from 'sweetalert2'

window.swal =   swal

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
})

window.toast =   toast

//

window.Vue  =   require('vue')
Vue.mixin(common)

Vue.component('footer-part'  , FooterPart)
Vue.component('navbar-part'  , NavbarPart)
Vue.component('sidebar-part' , SidebarPart)

Vue.component('mainapp', require('./components/template/mainapp.vue').default)

const app = new Vue ({
    el : '#app',
    router,
})