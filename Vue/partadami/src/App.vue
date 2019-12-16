<template>
  <div id="app">
    <div id="nav"><isAuth />
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>
    <router-view/>
  </div>
</template>

<script>
import isAuth from '@/components/isAuth'

export default {
  components: { isAuth },
}
</script>