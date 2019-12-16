<template>
  <div class="login">
    <h1>Вход</h1>
    <form @submit.prevent="loginForm">
      <input required v-model="login" type="text" placeholder="Логин"/>
      <input required v-model="password" type="password" placeholder="Пароль"/>
      <button type="submit">Войти</button>
    </form>{{ err }}
  </div>
</template>

<script>
export default {
  name: 'login',
  data: () => ({
    login: '',
    password: '',
    err: ''
  }),
  methods: {
    loginForm() {
      let login = this.login 
      let password = this.password
      this.$store.dispatch('Login', { login, password })
      .then(result => { 
        if (result.status == 200) this.$router.push('/')
        else if (result.status == 401) this.err = 'Неверный логин или пароль'
        else this.err = 'Ошибка соединения'
      })
      .catch(err => {
        this.err = err 
      })
    }
  }
}
</script>
