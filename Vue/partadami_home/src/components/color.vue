<template>
  <div class="colors">
      <a v-for="(color, i) in colors" :key="i" href="" :class="color"></a>
  </div>
</template>

<script>
export default {
    name:'color',
    props: [ 'colors' ]
}
</script>