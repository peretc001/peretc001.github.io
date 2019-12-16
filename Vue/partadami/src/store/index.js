import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex)

const axios = require('axios');

export default new Vuex.Store({
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user : {}
  },
  mutations: {
    auth_success(state, response){
      localStorage.setItem('token', response.token)
      
      // axios.defaults.headers.common['Authorization'] = response.token
      state.status = response.status
      state.token = response.token
      //get User from JWT token
      const payload = response.token.split(".");
      state.user = JSON.parse(atob(payload[1]))
      localStorage.setItem('login', state.user.login)
      localStorage.setItem('name', state.user.name)
      localStorage.setItem('isAuth', true)
    },
    auth_error(state){
        localStorage.removeItem('token')
        state.status = 'error'
    },
    logout(state){
        state.status = ''
        state.token = ''
        localStorage.removeItem('token')
    }
  },
  actions: {
    Login({commit}, user){
      return new Promise((resolve, reject) => {
        axios.post('https://www.partadami.ru/api/Login.php', { data: user }, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
        .then(resp => {
          if (resp.data.status == 200) {
            commit('auth_success', resp.data)
            // axios.defaults.headers.common['Authorization'] = token
          }
          resolve(resp.data)
        })
        .catch(err => {
          commit('auth_error')
          reject(err)
        })
      })
    },
    Logout({commit}) {
      return new Promise((resolve, reject) => {
        commit('logout')
        // delete axios.defaults.headers.common['Authorization']
        resolve()
      })
    },
    getUserList(context, token) {
      return new Promise((resolve, reject) => {
        axios.post('https://www.partadami.ru/api/getUserList.php', { data: token }, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
        .then(resp => {
          resolve(resp.data)
        })
        .catch(err => {
          reject(err)
        })
      })
    },
    getZakazItem(context, id) {
      return new Promise((resolve, reject) => {
        axios.get('https://www.partadami.ru/api/getZakazItem.php?id=' + id, { headers: {'Content-Type': 'application/json'} })
        .then(resp => {
          resolve(resp.data)
        })
        .catch(err => {
          reject(err)
        })
      })
    }
  },
  getters: {
    getUser: state => {
      const login = localStorage.getItem('login')
      const name = localStorage.getItem('name')
      const data = {
        'login': login,
        'name': name
      }
      return data
    },
    isAuth: state => {
      return localStorage.getItem('isAuth')
    }
  },
  modules: {
  }
})
