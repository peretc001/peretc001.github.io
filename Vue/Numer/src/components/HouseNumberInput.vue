<template>
   <div class="step3__input">
     <div class="step3__input__font">
        <input type="text" class="text" v-model="houseNumber.number" :placeholder="placeholder" @input="sethouseNumber()">
        <b-dropdown id="fonts" :text="'Шрифт ' + this.houseNumber.font" v-model="houseNumber.font" variant="dark">
          <b-dropdown-item v-for="(font, i) in this.$store.state.steps.step3.fonts" :key="i" @click="setHouseNumberFont(i)">Шрифт {{ i }}</b-dropdown-item>
        </b-dropdown>
        <div class="font__color">
          <div class="font__color__card" v-for="(color, index) in this.$store.state.steps.step3.colors" :key="index">
              <input
                :id="index + '-' + id"
                v-model="houseNumber.color"
                type="radio"
                :value="index"
                name="color"
                @input="setHouseNumberFontColor(color)"
              >
              <label :for="index + '-' + id" :class="index"></label>
          </div>
        </div>
      </div>
      <div class="step3__input__align">
        <b-form-input id="range" v-model="houseNumber.size" type="range" min="24" max="192" step="2" @input="setHouseNumberFontSize(houseNumber.size)"></b-form-input>
        <div class="button__list">
          <button
              class="btn btn-outline left"
              @click="setHouseNumberPadding('left')"></button>
          <button
              class="btn btn-outline right"
              @click="setHouseNumberPadding('right')"></button>
          <button
              class="btn btn-outline top"
              @click="setHouseNumberPadding('top')"></button>
          <button
              class="btn btn-outline bottom"
              @click="setHouseNumberPadding('bottom')"></button>
          <button
              class="btn btn-outline horizontal"
              @click="setHouseNumberPadding('horizontal')"></button>
          <button
              class="btn btn-outline vertical"
              @click="setHouseNumberPadding('vertical')"></button>
        </div>
      </div>
   </div>
</template>

<script>
export default {
  name: 'houseNumberInput',
  props: [
    'id',
    'placeholder'
  ],
  data () {
    return {
      houseNumber: {
        number: '1',
        font: '1',
        size: '48',
        color: '#FFFFFF',
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      }
    }
  },
  beforeMount () {
    this.houseNumber.number = this.$store.state.steps.step3[this.id].number
    this.houseNumber.font = this.$store.state.steps.step3[this.id].font
    this.houseNumber.size = this.$store.state.steps.step3[this.id].size
    this.houseNumber.color = this.$store.state.steps.step3[this.id].color

    this.houseNumber.padding.left = this.$store.state.steps.step3[this.id].padding.left
    this.houseNumber.padding.right = this.$store.state.steps.step3[this.id].padding.right
    this.houseNumber.padding.top = this.$store.state.steps.step3[this.id].padding.top
    this.houseNumber.padding.bottom = this.$store.state.steps.step3[this.id].padding.bottom
  },
  methods: {
    sethouseNumber () {
      let value = {
        id: this.id,
        val: this.houseNumber.number
      }
      this.$store.commit('setHouseNumber', value)
      this.$emit('number', this.houseNumber)
    },
    setHouseNumberFont (i) {
      let value = {
        id: this.id,
        val: i
      }
      this.$store.commit('setHouseNumberFont', value)
      this.houseNumber.font = value.val
      this.$emit('number', this.houseNumber)
    },
    setHouseNumberFontSize () {
      let value = {
        id: this.id,
        val: this.houseNumber.size
      }
      this.$store.commit('setHouseNumberFontSize', value)
      this.$emit('number', this.houseNumber)
    },
    setHouseNumberFontColor (color) {
      let value = {
        id: this.id,
        val: color
      }
      this.$store.commit('setHouseNumberFontColor', value)
      this.$emit('number', this.houseNumber)
    },
    setHouseNumberPadding (nav) {
      if (nav == 'left') { this.houseNumber.padding.left = this.$store.state.steps.step3[this.id].padding.left - 4 }
      if (nav == 'right') { this.houseNumber.padding.right = this.$store.state.steps.step3[this.id].padding.right - 4 }
      if (nav == 'top') { this.houseNumber.padding.top = this.$store.state.steps.step3[this.id].padding.top - 4 }
      if (nav == 'bottom') { this.houseNumber.padding.bottom = this.$store.state.steps.step3[this.id].padding.bottom - 4 }
      if (nav == 'horizontal') { this.houseNumber.padding.left = 0; this.houseNumber.padding.right = 0 }
      if (nav == 'vertical') { this.houseNumber.padding.top = 0; this.houseNumber.padding.bottom = 0 }

      let value = {
        id: this.id,
        val: this.houseNumber.padding
      }
      // Записываем в хранилище
      this.$store.commit('setHouseNumberPadding', value)
      this.$emit('number', this.houseNumber)
    }
  }
}
</script>
