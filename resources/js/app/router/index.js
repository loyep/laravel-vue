import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'

Vue.use(Router)

const router = new Router({
    base: '/',
    routes,
    mode: 'history'
})

router.beforeEach((to, from, next) => {
    next()
})

export default router
