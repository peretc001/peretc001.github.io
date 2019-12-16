<template>
    <div v-if="logged">
        Привет  {{ name }}
    </div>
</template>

<script>
export default {
    name: 'isAuth',
    data: () => ({
        logged: false,
        name: {}
    }),
    beforeMount() {
        this.logged = localStorage.getItem('isAuth')
        if (this.logged) {
            this.name = localStorage.getItem('name')
        }
    }
}
</script>