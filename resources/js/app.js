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

    import Chat from 'vue-beautiful-chat'

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

    Vue.use(Chat)
    Vue.use(VueSweetalert2);
    Vue.use(VueRouter)
    Vue.use(Vuetify)
    Vue.use(VueTelInput)
    Vue.use(VueFormWizard)
    Vue.use(VueFormGenerator)
    Vue.use(DatetimePicker)

    import App from './views/App'
    import Home from './views/Home'
    import Metro from './views/Metro'
    import Login from './views/Login'
    import Register from './views/Register'
    let Orders = require('./views/Orders.vue').default
    import Profile from './views/Profile'
    import Freight from './views/Freight'
    import ViewFreightOrder from './views/ViewFreightOrder'
    import Viewmetro_order from './views/Viewmetro_order'
    import Metro_orders from './views/Metro_orders'
    import Freight_orders from './views/Freight_orders'
    import ForgotPassword from './views/ForgotPassword'
    import ResetPasswordForm from './views/ResetPasswordForm'
    import Moves from './views/Moves'
    import OrderTracker from './views/OrderTracker'
    import EmailVerification from './views/EmailVerification'
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
                path: '/volantuser/metro',
                name: 'metro',
                component: Metro,
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
            },
            {
                path: '/volantuser/freight',
                name: 'freight',
                component: Freight,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/view_freight_order/:id',
                name: 'view_freight_order',
                component: ViewFreightOrder,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/view_order/:id',
                name: 'view_metro_order',
                component: Viewmetro_order,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/metro_orders',
                name: 'metro_orders',
                component: Metro_orders,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/freight_orders',
                name: 'freight_orders',
                component: Freight_orders,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            { 
                path: '/volantuser/reset-password', 
                name: 'reset-password', 
                component: ForgotPassword,
              },
              { 
                path: '/volantuser/reset-password/:token', 
                name: 'reset-password-form', 
                component: ResetPasswordForm, 
                
              },
              {
                path: '/volantuser/packaging_moves',
                name: 'packaging_moves',
                component: Moves,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/OrderTracker',
                name: 'order_tracker',
                component: OrderTracker,
                meta: {
                    requiresAuth: true,
                    is_user: true
                }
            },
            {
                path: '/volantuser/auth/emailverification/:token',
                name: 'emailverification',
                component: EmailVerification,
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
