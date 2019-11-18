
<template>
   <div class="step3__left">
      <div class="step3__left__img">
         <img :src="img">
      </div>
      <div class="step3__left__house">
         <span v-if="selected_number == 'number'">
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.number.font],
               'font-size': this.step3.number.size + 'px',
               'color': this.step3.number.color,
               'transform': 'translate(' + (this.step3.number.padding.left - this.step3.number.padding.right) + 'px,' + (this.step3.number.padding.top - this.step3.number.padding.bottom) + 'px)',
               }">
               {{ this.step3.number.number }}
            </p>
         </span>
         <span v-if="selected_number == 'adress'">
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.number.font],
               'font-size': this.step3.number.size + 'px',
               'color': this.step3.number.color,
               'transform': 'translate(' + (this.step3.number.padding.left - this.step3.number.padding.right) + 'px,' + (this.step3.number.padding.top - this.step3.number.padding.bottom) + 'px)',
               }">
               {{ this.step3.number.number }}
            </p>
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.adress.font],
               'font-size': this.step3.adress.size + 'px',
               'color': this.step3.adress.color,
               'transform': 'translate(' + (this.step3.adress.padding.left - this.step3.adress.padding.right) + 'px,' + (this.step3.adress.padding.top - this.step3.adress.padding.bottom) + 'px)',
               }">
               {{ this.step3.adress.number }}
            </p>
         </span>
         <span v-if="selected_number == 'adressSecond'">
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.number.font],
               'font-size': this.step3.number.size + 'px',
               'color': this.step3.number.color,
               'transform': 'translate(' + (this.step3.number.padding.left - this.step3.number.padding.right) + 'px,' + (this.step3.number.padding.top - this.step3.number.padding.bottom) + 'px)',
               }">
               {{ this.step3.number.number }}
            </p>
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.adress.font],
               'font-size': this.step3.adress.size + 'px',
               'color': this.step3.adress.color,
               'transform': 'translate(' + (this.step3.adress.padding.left - this.step3.adress.padding.right) + 'px,' + (this.step3.adress.padding.top - this.step3.adress.padding.bottom) + 'px)',
               }">
               {{ this.step3.adress.number }}
            </p>
            <p class="houseNumber" :style="{
               'font-family': this.$store.state.steps.step3.fonts[this.step3.adressSecond.font],
               'font-size': this.step3.adressSecond.size + 'px',
               'color': this.step3.adressSecond.color,
               'transform': 'translate(' + (this.step3.adressSecond.padding.left - this.step3.adressSecond.padding.right) + 'px,' + (this.step3.adressSecond.padding.top - this.step3.adressSecond.padding.bottom) + 'px)',
               }">
               {{ this.step3.adressSecond.number }}
            </p>
         </span>
      </div>
   </div>
</template>

<script>
export default {
  name: 'houseNumberView',
  props: [
    'step3',
    'img',
    'selected_number'
  ]
}
</script>
