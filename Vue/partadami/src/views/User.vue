<template>
  <div>
        <div class="products">
            <div v-for="(product, i) in zakazItem" :key="i" class="products__item">
                <Product :product="product"/>
            </div>
        </div>
  </div>
</template>

<script>
import Product from '@/components/Product'

export default {
    name: 'user',
    components: { Product },
    beforeMount() {
        console.log(this.product)
    }
}
</script>
