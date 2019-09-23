import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import VueHtml2Canvas from 'vue-html2canvas'
import regeneratorRuntime from 'regenerator-runtime';

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// CSS
import './assets/css/main.min.css'


Vue.use(BootstrapVue)
Vue.config.productionTip = false
Vue.use(VueHtml2Canvas)
Vue.use(regeneratorRuntime)

Vue.directive('phone', {
  bind (el) {
    el.oninput = function (e) {
      if (!e.isTrusted) {
        return
      }
      // if (e.target.value.length === 14) console.log('ok');
      let x = this.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/)
      this.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '')
      el.dispatchEvent(new Event('input'))
    }
  }
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
