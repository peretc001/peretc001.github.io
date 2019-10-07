import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode:'abstract',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'FirstStep',
      component: () => import('./components/steps/FirstStep'),
      meta: { step:1 }
    },
    {
      path: '/SecondStep',
      name: 'SecondStep',
      component: () => import('./components/steps/SecondStep'),
      meta: { step:2 }
    },
    {
      path: '/ThirdStep',
      name: 'ThirdStep',
      component: () => import('./components/steps/ThirdStep'),
      meta: { step:3 }
    },
    {
      path: '/FourthStep',
      name: 'FourthStep',
      component: () => import('./components/steps/FourthStep'),
      meta: { step:4 }
    },
    {
      path: '/FifthStep',
      name: 'FifthStep',
      component: () => import('./components/steps/FifthStep'),
      meta: { step:5 }
    },
    {
      path: '/SixthStep',
      name: 'SixthStep',
      component: () => import('./components/steps/SixthStep'),
      meta: { step:6 }
    },
    {
      path: '/SeventhStep',
      name: 'SeventhStep',
      component: () => import('./components/steps/SeventhStep'),
      meta: { step:7 }
    },
    {
      path: '/EighthStep',
      name: 'EighthStep',
      component: () => import('./components/steps/EighthStep'),
      meta: { step:8 }
    },
    {
      path: '/NinthStep',
      name: 'NinthStep',
      component: () => import('./components/steps/NinthStep'),
      meta: { step:9 }
    },
    {
      path: '/TenthStep',
      name: 'TenthStep',
      component: () => import('./components/steps/TenthStep'),
      meta: { step:10 }
    }
  ]
})
