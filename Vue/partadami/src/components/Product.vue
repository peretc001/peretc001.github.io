<template>
  <div class="products__item__component">
      <a :href="'https://partadami.ru'+product.url" target="_blank">
            <img :src="'https://partadami.ru'+product.img" alt="">
            <p>{{ product.name }}</p>
            <p>{{ product.color }}</p>
            <p>{{ product.model }}</p>
            <p>{{ product.qty }}</p>
            <p><strike>{{ product.old_price }}</strike></p>
            <p>{{ product.price }}</p>
        </a>
  </div>
</template>

<script>
export default {
    name: 'products',
    props: [
        'product'
    ]
}
</script>

<style>

</style>template