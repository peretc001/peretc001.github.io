<template>
  <div id="Home">
    <div class="phone">8(111)111 11 11</div>
    <div class="step">
      <div class="step-current">{{currentStep}}</div>
      <div class="step-max">{{maxStep}}</div>
    </div>
    <Form :step='currentStep'/>

    <div class="author-img">
      Автор изображения<br>
      anatolylobov
    </div>

    <div class="counter-building">
      <div class="counter-building__number">{{countBuildings }}</div>
      <div class="counter-building__text">Сейчас в нашей базе квартир<br>
        Ежедневно количество квартир меняется
      </div>
    </div>
  </div>
</template>

<script>
  import Form from '../components/Form'

  export default {
    name: 'Home',
    data: () => ({
      maxStep: 10,
      countBuildings: 0
    }),
    beforeMount() {
      let max = 69000;
      let min = 62000;
      this.countBuildings = new Intl.NumberFormat().format(Math.floor(Math.random() * (max - min)) + min);
    },
    computed: {
      currentStep () {
        return this.$store.state.step
      }
    },
    methods: {},
    components: {
      Form
    }
  }
</script>

<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
  }

  #app {
    background: url('../assets/background.png') center center no-repeat;
    background-size: cover;
    height: 100vh;
    position: relative;
  }

  .phone {
    font-size: 24px;
    line-height: 14px;
    color: #FFFFFF;
    position: absolute;
    right: 50px;
    top: 30px
  }

  .step {
    color: #ffffff;
    position: absolute;
    max-width: 60px;
    width: 100%;
    left: 40px;
    top: 50%;
    text-align: right;
  }

  .step-current {
    font-size: 64px;
    border-bottom: 1px solid #ffffff;
    padding: 5px;
  }

  .step-max {
    font-size: 16px;
    padding: 5px;
  }

  .author-img {
    font-size: 12px;
    color: #ffffff;
    position: absolute;
    left: 50px;
    bottom: 28px;
  }

  .counter-building {
    color: #ffffff;
    position: absolute;
    right: 50px;
    bottom: 31px;
  }

  .counter-building__number {
    font-size: 36px;
    margin-bottom: 10px;
    text-align: right;
  }

  .counter-building__text {
    font-size: 12px;
    text-align: right;
  }

</style>
