import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'abstract',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('./views/About.vue')
    },
    {
      path: '/step1',
      name: 'step1',
      component: () => import('./views/step/Step1.vue')
    },
    {
      path: '/step2',
      name: 'step2',
      component: () => import('./views/step/Step2.vue')
    },
    {
      path: '/step3',
      name: 'step3',
      component: () => import('./views/step/Step3.vue')
    },
    {
      path: '/step4',
      name: 'step4',
      component: () => import('./views/step/Step4.vue')
    },
    {
      path: '/step5',
      name: 'step5',
      component: () => import('./views/step/Step5.vue')
    }
  ]
})
