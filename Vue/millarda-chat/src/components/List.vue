<template>
   <div>
      User {{ uid }}
   </div>
</template>

<script>
export default {
   name: 'List',
   props: [
    'uid',
  ],
  beforeMount () {
     console.log(this.uid)
  }
}
</script>