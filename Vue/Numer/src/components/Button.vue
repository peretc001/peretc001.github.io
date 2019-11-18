<template>
   <div class="step__button">
      <b-button v-if="display" @click="goBack()" variant="outline-success">Назад</b-button>
      <b-button @click="goNext()" variant="success" :disabled="disabled">Далее</b-button>
   </div>
</template>
<script>
export default {
   name: 'Button',
   props: [
      'disabled'
   ],
   data() {
      return {
         display: true,
         select: true,
         path: null
      }
   },
   beforeMount () {
      this.path = this.$route.path
      this.$route.path == '/step1' ? this.display = false : ''
   },
   methods: {
      goBack() {
         this.path == '/step2' ? this.$router.push('/step1') : ''
         this.path == '/step3' ? this.$router.push('/step2') : ''
         this.path == '/step4' ? this.$router.push('/step3') : ''
      },
      goNext() {
         this.path == '/step1' ? this.$router.push('/step2') : ''
         this.path == '/step2' ? this.$router.push('/step3') : ''
         this.path == '/step3' ? this.$router.push('/step4') : ''
         this.path == '/step4' ? this.$router.push('/step5') : ''
      }
   }
}
</script>