<template>
    <div class="container">
        <div class="form__title">
            Квартира в каком жилом фонде Вам интересна?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="new-flat" required  value="new-flat" v-model="housingStock1">
                <label for="new-flat">Квартира в новостройке </label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="secondary-flat" required value="secondary-flat" v-model="housingStock2">
                <label for="secondary-flat"> Квартира на вторичном рынке </label>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "SecondStep",
        computed: {
            housingStock1: {
                get() {
                    return this.$store.state.form.SecondStep.newFlat
                },
                set(value) {
                    let obj = {
                        input: 'SecondStep',
                        name: 'newFlat',
                        value:value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock2: {
                get() {
                    return this.$store.state.form.SecondStep.secondaryFlat
                },
                set(value) {
                    let obj = {
                        input: 'SecondStep',
                        name: 'secondaryFlat',
                        value:value
                    };
                    this.$store.commit('updateForm', obj)
                }
            }
        }
    }
</script>

<style scoped>
</style>
