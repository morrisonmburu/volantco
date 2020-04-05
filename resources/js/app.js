import Vue from 'vue'
    import VueRouter from 'vue-router'
    import Vuetify from 'vuetify'
    import VueTelInput from 'vue-tel-input'

    import VueFormWizard from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    //local registration
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    
    import VueFormGenerator from "vue-form-generator"
    import 'vue-form-generator/dist/vfg.css'
    import DatetimePicker from 'vuetify-datetime-picker'
    // (Optional) import 'vuetify-datetime-picker/src/stylus/main.styl'
    import lang from 'element-ui/lib/locale/lang/en';
    import locale from 'element-ui/lib/locale';
    import VueLazyload from 'vue-lazyload';

    locale.use(lang);

    import { Parallax } from './assets/components';
    /**
     * You can register global components here
     */

    const globalComponents = {
      install(Vue) {
        Vue.component(Parallax.name, Parallax);
      }
    };

    Vue.use(VueLazyload, {
      observer: true,
      // optional
      observerOptions: {
        rootMargin: '0px',
        threshold: 0.1
      }
    });

    import VueSweetalert2 from 'vue-sweetalert2';
 
    // If you don't need the styles, do not connect
    import 'sweetalert2/dist/sweetalert2.min.css';
     
    Vue.use(VueSweetalert2);

    Vue.use(VueRouter)
    Vue.use(Vuetify)
    Vue.use(VueTelInput)
    Vue.use(VueFormWizard)
    Vue.use(VueFormGenerator)
    Vue.use(DatetimePicker)

    import App from './views/App'
    import Home from './views/Home'
    import Login from './views/Login'
    import Register from './views/Register'
    import Orders from './views/Orders'
    import Profile from './views/Profile'
    // import UserBoard from './views/UserBoard'
    
    Vue.component('pagination', require('laravel-vue-pagination'));

    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/volantuser/login',
                name: 'login',
                component: Login
            },
            {
                path: '/volantuser/register',
                name: 'register',
                component: Register
            },
            {
                path: '/volantuser/home',
                name: 'home',
                component: Home,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/orders',
                name: 'orders',
                component: Orders,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/editProfile',
                name: 'editProfile',
                component: Profile,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            }
        ],
    })

    router.beforeEach((to, from, next) => {
        if (to.matched.some(record => record.meta.requiresAuth)) {
            if (localStorage.getItem('volant.jwt') == null) {
                next({
                    path: '/volantuser/login',
                    params: { nextUrl: to.fullPath }
                })
            } else {
                let user = JSON.parse(localStorage.getItem('volant.user'))
                
                if (to.matched.some(record => record.meta.is_user)) {
                   
                
                  //       next({
		                //     path: '/volantuser/home',
		                //     params: { nextUrl: to.fullPath }
		                // })
                    
                }
                next()
            }
        } else {
            next()
        }
    })

    const vuetify = new Vuetify()

    const app = new Vue({
        el: '#app',
        components: { App },
        router,
        vuetify,
        FormWizard,
        TabContent
    });