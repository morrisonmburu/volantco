import Vue from 'vue'
    import VueRouter from 'vue-router'
    import Vuetify from 'vuetify'
    import VueTelInput from 'vue-tel-input'

    import * as VueGoogleMaps from "vue2-google-maps";

    Vue.use(VueGoogleMaps, {
        load: {
            key: "AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI",
            libraries: "places"
        }
    })

    import VueFormWizard from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    //local registration
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    
    import VueFormGenerator from "vue-form-generator"
    import 'vue-form-generator/dist/vfg.css'

    Vue.use(VueRouter)
    Vue.use(Vuetify)
    Vue.use(VueTelInput)
    Vue.use(VueFormWizard)
    Vue.use(VueFormGenerator)

    import App from './views/App'
    import Home from './views/Home'
    import Login from './views/Login'
    import Register from './views/Register'
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