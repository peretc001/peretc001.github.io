<template>
  <div class="home">
    <div class="home__count">
      <span class="zakaz__count__text">Всего заказов</span>
      <p>
        <number
          ref="counter"
          from="1"
          animationPaused
          :to="count"
        />
      </p>
    </div>
    <div class="home__head">
      <h3>Последние заказы</h3> | <router-link to="/user/">Все заказы</router-link>
    </div>
    <div class="zakazList">
      <div v-for="(zakaz, index) in zakazLastFive" v-bind:key="index" class="zakazList__item">
        <ZakazItems :zakaz="zakaz"/>
      </div>
    </div>
  </div>
</template>

<script>
import ZakazItems from '@/components/ZakazItem'

export default {
  name: 'home',
  components: { ZakazItems },
  data () {
    return {
      zakazList: [],
      zakazLastFive: [],
      count: 100
    }
  },
  async beforeMount() {
    const token = this.$store.state.token
    await this.$store.dispatch('getUserList', { token } )
      .then(result => {
        if (result.status == 401) {
          this.$router.push('/login')
        } else {
          this.count = result.length
          this.zakazList = result.reverse()
          this.zakazLastFive = this.zakazList.slice(0,5)
        }
    })
    await this.playAnimation()
  },
  methods: {
    playAnimation() {
      this.$refs.counter.play();
      this.user = this.$store.state.user
    }
  }
}
</script>
