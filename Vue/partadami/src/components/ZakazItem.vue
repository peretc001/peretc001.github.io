<template>
    <div :class="'zakazList__item__component ' + zakaz.status">
        <p class="number"><router-link to='/user/'><b>N {{ zakaz.id }}</b></router-link></p>
        <div class="user_data">
            <p class="user">
                <span v-if="zakaz.lastname">{{ zakaz.lastname }} {{ zakaz.firstname }} {{ zakaz.middlename }}</span>
                <span v-else>{{ zakaz.firstname }}</span>
            </p>
            <p><a :href="'tel:'+zakaz.phone" class="phone">{{ zakaz.phone }}</a></p>
            <p><a :href="'mailto:'+zakaz.email" class="email">{{ zakaz.email }}</a></p>
            <p class="city">{{ zakaz.city }}</p>
            <p v-if="zakaz.msg" class="msg">{{ zakaz.msg }}</p>
        </div>
        <p class="total">Товаров: <b>{{ qty }}</b> на сумму <b>{{ total }}</b></p>
    </div>
</template>

<script>
export default {
    name: 'zakazItem',
    props: [
        'zakaz'
    ],
    data() {
        return {
            zakazItem: {},
            total: 0,
            qty: 0,
            meta: ''
        }
    },
    async beforeMount() {
    await this.$store.dispatch('getZakazItem', this.zakaz.id)
      .then(result => {
        this.zakazItem = result.all
        this.qty = result.all.length
        this.total = result.total
    })
    //zakaz.id == 1094 ? this.meta = ' ok' : ''
  },
}
</script>