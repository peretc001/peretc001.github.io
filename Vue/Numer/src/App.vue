<template>
  <div id="app">
    <Nav />
    <router-view />
  </div>
</template>

<script>
import Nav from './components/Nav.vue'

export default {
  components: {
    Nav
  },
  beforeMount () {
    this.$router.push('/step2')
  }
}
</script>
