<template>
    <div class="container">
        <div class="form__title">
            Как Вы планируете покупать квартиру?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="cash" required  value="cash" v-model="housingStock1">
                <label for="cash">за наличные</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="mortgage" required value="mortgage" v-model="housingStock2">
                <label for="mortgage">в ипотеку</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="installments" required value="installments" v-model="housingStock3">
                <label for="installments">в рассрочку</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="capital" required value="capital" v-model="housingStock4">
                <label for="capital">материнский капитал</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="militaryMortgage" required value="militaryMortgage" v-model="housingStock5">
                <label for="militaryMortgage">военная ипотека</label>
            </div>

        </div>
    </div>
</template>

<script>
	export default {
		name: "SeventhStep",
		computed: {
			housingStock1: {
				get() {
					return this.$store.state.form.SeventhStep.cash
				},
				set(value) {
					let obj = {
						input: 'SeventhStep',
						name: 'cash',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock2: {
				get() {
					return this.$store.state.form.SeventhStep.mortgage
				},
				set(value) {
					let obj = {
						input: 'SeventhStep',
						name: 'mortgage',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock3: {
				get() {
					return this.$store.state.form.SeventhStep.installments
				},
				set(value) {
					let obj = {
						input: 'SeventhStep',
						name: 'installments',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock4: {
				get() {
					return this.$store.state.form.SeventhStep.capital
				},
				set(value) {
					let obj = {
						input: 'SeventhStep',
						name: 'capital',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock5: {
				get() {
					return this.$store.state.form.SeventhStep.militaryMortgage
				},
				set(value) {
					let obj = {
						input: 'SeventhStep',
						name: 'militaryMortgage',
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