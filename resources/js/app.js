require('./bootstrap');
import { createApp } from 'vue/dist/vue.runtime.esm-bundler';
import router from './routes.js';
import axios from 'axios'
import VueAxios from 'vue-axios'
// import store from './store/modules/Auth/auth.js'

axios.defaults.baseURL = '/api/'

// vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css'
import { VuetifyDateAdapter } from 'vuetify/labs/date/adapters/vuetify'
const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
          mdi,
        },
    },
    adapter: VuetifyDateAdapter,
})

//Vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;

//COMMON
import common from './common';

// Vuex
import { createStore } from 'vuex';
const store = createStore({
  state:
  {
    token: null,
    user_ref: null,
    user_fname: null,
    user_lname: null,
  },

  mutations: 
  {
    authUser (state, payload) {
      state.token = payload.token;
      state.user_ref = payload.user_ref;
      state.user_fname = payload.customer_fname;
      state.user_lname = payload.customer_lname;
    },

    resetUser(state) {
      state.token = '';
      state.user_ref = '';
      state.user_fname = '';
      state.user_lname = '';
    }
  },

  actions: 
  {
    login({commit}, authData) {
      axios.post('/login', authData)
      .then((res) => {
        var user_data = {
          "token": res.data.data.token,
          "user_ref": res.data.data.customer_ref,
          "customer_fname": res.data.customer_fname,
          "customer_lname": res.data.customer_lname
        };
        localStorage.setItem("user_data", JSON.stringify(user_data));
        store.commit({
          type: 'authUser',
          data: {
            token: res.data.token,
            user_ref: res.data.customer_ref,
            customer_fname: res.data.customer_fname,
            customer_lname: res.data.customer_lname
          }
        });
        router.push('/product-list').catch(() => {});
      })
      .catch(error => console.log(error))
    },

    logout({ commit }) {
      axios.post('/logout')
      .then((res) => {
        localStorage.removeItem("user_data");
        store.commit('resetUser');
        router.push('/').catch(() => {});
      })
    }

    // register ({commit}, authData) {
    //   axios.post('register', authData)
    //     .then((res) => {
    //       commit('authUser', {
    //         token: res.data.token,
    //       })
    //       localStorage.setItem('token', res.data.token)
    //     })
    //     .catch(error => console.log(error))
    // }
  },

  getters: 
  {
    customerData(state, getters) {
      console.log('gettt')
      console.log(getters.user_fname);
      const customer_data = {
        'fname': state.user_fname,
        'lname': getters.user_lname
      };
      return customer_data;
    }
  }
})

// routing
function loggedIn() {
  return JSON.parse(localStorage.getItem("user_data"))
}
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!loggedIn() && to.name != 'login') {
        next({
            path: '/login',
        })
      } else {
        next()
      }
  // } 
  // else if (to.matched.some(record => record.meta.guest)) {
  //     if (loggedIn()) {
  //         next({
  //             path: to.fullPath,
  //         })
  //     } else {
  //         next()
  //     }
  } else {
      next() // make sure to always call next()!
  }
})

// components
import Footer from './components/layouts/Footer.vue'
import Header from './components/layouts/Header.vue'
import Alert from './components/Alert.vue'

//Modal
import ModalBasketItems from './modal/Basket_Items/Modal_Basket_Items.vue'

// initiate vue app
const app = createApp({})
app.component('app-footer', Footer)
app.component('app-header', Header)
app.component('app-alert', Alert)

app.use(vuetify)
app.use(router)
app.use(VueAxios, { $axios: axios})
// app.use(VueAxios, axios)
// app.provide('axios', app.config.globalProperties.axios)
app.use(store)
app.mixin(common)
app.mount("#app")
