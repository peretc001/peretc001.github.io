import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueNumber from 'vue-number-animation'

import '@/assets/css/main.min.css'

Vue.use(VueNumber)
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
