<template>
    <div class="container">
        <div class="form__title">
            Сколько комнат Вам нужно?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="StudioApartment" required  value="StudioApartment" v-model="housingStock1">
                <label for="StudioApartment">Квартира-студия</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="flat1" required value="flat1" v-model="housingStock2">
                <label for="flat1">1-комната</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="flat2" required value="flat2" v-model="housingStock3">
                <label for="flat2">2-комнаты</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="flat3" required value="flat3" v-model="housingStock4">
                <label for="flat3">3-комнаты</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="flat4" required value="flat4" v-model="housingStock5">
                <label for="flat4">4-комнаты</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="more4flat" required value="more4flat" v-model="housingStock6">
                <label for="more4flat">больше 4 комнат</label>
            </div>


        </div>
    </div>
</template>

<script>
	export default {
		name: "ThirdStep",
		computed: {
			housingStock1: {
				get() {
					return this.$store.state.form.ThirdStep.StudioApartment
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'StudioApartment',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock2: {
				get() {
					return this.$store.state.form.ThirdStep.flat1
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'flat1',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock3: {
				get() {
					return this.$store.state.form.ThirdStep.flat2
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'flat2',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock4: {
				get() {
					return this.$store.state.form.ThirdStep.flat3
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'flat3',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock5: {
				get() {
					return this.$store.state.form.ThirdStep.flat4
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'flat4',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock6: {
				get() {
					return this.$store.state.form.ThirdStep.more4flat
				},
				set(value) {
					let obj = {
						input: 'ThirdStep',
						name: 'more4flat',
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
