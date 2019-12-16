import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const axios = require('axios');
const ids = {
  'id': [ '17-04', '14', '14-02', '41' ],
  'package': 'parta_0_stul',
  'category': 'parta_bez_risunka'
}

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
    getProducts() {
      return new Promise((resolve, reject) => {
        axios.post('https://www.partadami.ru/api/getProducts.php', { data: ids }, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
        .then(resp => {
          resolve(resp.data)
        })
        .catch(err => {
          reject(err)
        })
      })
    },
  },
  modules: {
  }
})
