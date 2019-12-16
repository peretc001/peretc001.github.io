<template>
  <div id="app">
    <div class="card">
      <card v-for="(product,i) in products" :key="i" :product="product"/>
    </div>
  </div>
</template>

<script>
import card from '@/components/card'
export default {
  name: 'app',
  components: {
    card
  },
  data: () => ({
    products: {}
  }),
  async beforeMount() {
    const token = this.$store.state.token
    await this.$store.dispatch('getProducts')
      .then(result => {
        if (result.status == 401) {
          console.log('error')
        } else {
          this.products = result
        }
    })
  },
}
</script>