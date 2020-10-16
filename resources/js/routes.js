import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: require('./views/Dashboard').default
        },
        {
            path: '/items',
            name: 'items',
            component: require('./views/items/Index').default
        },
        {
            path: '/items/new',
            name: 'itemsNew',
            component: require('./views/items/Form').default
        },
        {
            path: '/items/:id/edit',
            name: 'itemsEdit',
            component: require('./views/items/Form').default
        }
    ],
});

export default router
