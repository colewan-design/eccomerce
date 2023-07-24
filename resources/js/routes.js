import { createRouter, createWebHistory } from 'vue-router'

// pages
import Dashboard from './pages/Dashboard.vue'
import Login from './pages/Auth/Login.vue'
import Subscribe from './pages/Subscribe.vue'
import NotFoundComponent from './pages/Error/error_404.vue'
import HowItWorks from './pages/HowItWorks.vue'
import ProductList from './pages/ProductList.vue'
import BasketItems from './pages/BasketItems.vue'
import Basket from './pages/Basket.vue'
import Additional from './pages/Additional.vue'

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
        meta: { guest: true }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: { guest: true }
    },
    {
        path: '/subscribe',
        name: 'subscribe',
        component: Subscribe
    },
    { 
        path: '/:pathMatch(.*)', 
        component: NotFoundComponent ,
        meta: { guest: true }
    },
    {
        path: '/how-it-works',
        name: 'how-it-works',
        component: HowItWorks
    },
    {
        path: '/product-list',
        name: 'product-list',
        component: ProductList
    },
    {
        path: '/basket-items',
        name: 'basket-items',
        component: BasketItems
    },
    {
        path: '/basket',
        name: 'basket',
        component: Basket
    },
    {
        path: '/additional',
        name: 'additional',
        component: Additional
    },
];



const router = createRouter({
    history: createWebHistory(),
    routes
})


function loggedIn() {
    return JSON.parse(localStorage.getItem("mobileUserData"))
  }
  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
                path: '/login',
                // query: { redirect: to.fullPath }
            })
        } else {
            next({
                path: '/dashboard',
                // query: { redirect: to.fullPath }
            })
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: '/dashboard',
                // query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
  })

export default router