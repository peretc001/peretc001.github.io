<template>
  <div id="app">
    <div class="container">
      <h1>Калькулятор</h1>
      <div class="row">
        <div class="color">
          <div v-for='(color, i) in colors' :key='i' class="color__card">
            <input :id="i" type="radio" name="color" :value="color" @change="setColor(i)">
            <label :for="i" :class="i">
              {{ color }}
            </label>
          </div>
        </div>
        <select class="step">
          <option v-for='(step, i) in steps' :key='i' :value="i">
            {{ step }}
          </option>
        </select>
        <div class="params">
          <div class="width">
            <button @click="widthMinus()">-</button> <span>{{ width }}</span> <button @click="widthPlus()">+</button>
          </div>
          <div class="height">
            <button @click="heightMinus()">-</button> <span>{{ height }}</span> <button @click="heightPlus()">+</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="display">
          <div class="display__blocks">
            <span v-for="(w, i) in this.width" :key="i" :style="{ 'background': selected_color }"></span>
          </div>
          <div class="display__blocks">
            <span v-for="(h, i) in this.height" :key="i" :style="{ 'background': selected_color }"></span>
          </div>
        </div>
      </div>
    </div>
    Размер: {{ w }} x {{ h }}
    <br>
    <br>
    <p class="price">{{ price }}</p>
  </div>
</template>

<script>

export default {
  name: 'app',
  data() {
    return {
      price: 19800,
      selected_color: 'red',
      colors: {
        red: 'Красный',
        green: 'Зеленый',
        white: 'Белый',
        blue: 'Синий',
        yellow: 'Желтый',
        rgb: 'Три цвета',
        p5: 'Полноцвет (Р5)',
        p6: 'Полноцвет (Р6)',
        p10: 'Полноцвет (Р10)'
      },
      steps: {
        s1: 1.25,
        s2: 1.66,
        s3: 1.83,
        s4: 2,
        s5: 2.5,
        s6: 3.07,
        s7: 3,
        s8: 4,
        s9: 4.81,
        s10: 5,
        s11: 6,
        s12: 6.66,
        s13: 8,
        s15: 10
      },
      width: 3,
      height: 6,
      w: 53,
      h: 197
    }
  },
  methods: {
    widthMinus() {
      if (this.width > 1) 
        this.width -= 1, this.w -= 16, this.price -= 1000*this.height
    },
    widthPlus() {
      this.width += 1
      this.w += 16 
      this.price += 1000*this.height
    },
    heightMinus() {
      if (this.height > 1)
        this.height -= 1, this.h -= 32, this.price -= 1000*this.width
    },
    heightPlus() {
      this.height += 1
      this.h += 32
      this.price += 1000*this.width
    },
    setColor(i) {
      this.selected_color = i
    }
  }
}
</script>

<style lang="sass">
.row
  display: flex
  align-items: flex-start
  justify-content: space-betwen
.color
  display: flex
  flex-wrap: wrap
  align-items: center
  justify-content: space-betwen
  width: 600px
  margin-right: 1em
  &__card
    flex: 1 1 auto
    input
      display: none
    label
      display: block
      text-align: center
      padding: 1em
      margin-bottom: 1em
      max-width: 200px
      user-select: none
      border: 2px solid #fff
      cursor: pointer
      position: relative
      &.red
        background: red
        color: #fff
      &.green
        background: green
        color: #fff
      &.white
        background: white
      &.blue
        background: blue
        color: #fff
      &.yellow
        background: yellow
      &.rgb
        background: linear-gradient(to right, red 30%, green 30%, green 70%, blue 30%)
        color: #fff
      &.p5
        background: linear-gradient(to top left, powderblue, pink)
        color: #fff
      &.p6
        background: linear-gradient(to top left, powderblue, pink)
        color: #fff
      &.p10
        background: linear-gradient(to top left, powderblue, pink)
        color: #fff
      
    input:checked + label
      border: 2px solid green
  
.step
  margin-right: 1em
  appearance: none
  width: 200px
  padding: .5em 1em
  font-size: 1em
  outline: none
  box-shadow: none
  background-size: 1em
  background-repeat: no-repeat
  background-position: 95% center
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABI0lEQVRoge2ZS4rCQBBAH+I+4joLDzJrL+k9RnTEGXCjMnoBF3oED6BkFnaTnhDTkm91rAcNIXRX6lGkihBQFEVRlGr8AEnD6wasSuS2McvLsETwNvnoOoG6sBX1Mmg4kdZQEWmoiDQGwDfdzopa6E1FpKNzJFhURBq9EllTfm58tZ9yPr2piHR0jgSLikijS5EZ8AvEFWLEJsYMHt8Qr8yNO7Cs8NAsnybuiecyRV0rNmcTE6szkQjYmdhnYJKz55mIK3EExjXmVQqfTJ6IOAlLkUxWRKyExZW5kMq4IuIlLBGw5b+MFXElDgiWsIyAPWk3SzLXe7MnCFwZd3klFjmHbLudN5dvIVkZr4TU/yNXYEo6t6bmXrCMCOidUBRFeUP+AHg2qBFo0bICAAAAAElFTkSuQmCC')

.params
  display: flex
  align-items: center
  justify-content: space-betwen
  flex-direction: column
  .width,
  .height
    display: block
    margin-bottom: 1em
    display: flex
    justify-content: space-betwen
  button
    widht: 20px
    font-size: 1em
    text-align: center
    border: none
    background: none
    cursor: pointer
    outline: none
    box-shadow: none
  span
    width: 20px
    font-size: 1em
    text-align: center
    border: 1px solid #ebebeb
    padding: .5em 1em
  
.display
  display: flex
  flex-direction: column
  &__blocks
    display: flex
    margin-bottom: 1em
    span
      width: 30px
      height: 30px
      display: block
      border: 1px solid #ebebeb
      margin-right: .5em
.price
  font-size: 2em
  font-weight: bold


</style>
