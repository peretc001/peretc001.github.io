<template>
    <div class="card__item">
        <a :href='"https://partadami.ru/shop/"+product.category+"/cyt"+product.art+"/bez_stula/parta_cyt"+product.url+".php"'>
            <img :src='"https://partadami.ru/shop/img/"+product.url+"/parta_bez_stula/"+product.img' :alt="product.name">
            <p class="name">{{ product.name }}</p>
        </a>
        <p><span class="model">Модель: {{ product.model }}</span></p>
        <color :colors="colors"/>
        <p><span class="old">{{ product.price }}</span></p>
        <p><span class="price">{{ product.price - 1000 }}</span></p>
    </div>
</template>

<script>
import color from '@/components/color'
export default {
    name: 'card',
    components: { color },
    props: [ 'product' ],
    data: () => ({
        colors: ['grey', 'pink', 'blue']
    })
}
</script>