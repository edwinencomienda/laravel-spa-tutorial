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
        },
        {
            path: '/users',
            name: 'users',
            component: require('./views/users/Index').default
        }
    ],
});

router.beforeEach((to, from, next) => {
    if (to.name === 'users' && window.App.currentUser.role !== 'admin') {
        next(false)
    } else {
        next()
    }
})

export default router
