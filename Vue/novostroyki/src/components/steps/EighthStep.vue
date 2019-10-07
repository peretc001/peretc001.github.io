<template>
    <div class="container">
        <div class="form__title">
            Когда Вы планируете покупать квартиру?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="month1" required  value="month1" v-model="housingStock1">
                <label for="month1">в течение месяца</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="month3" required value="month3" v-model="housingStock2">
                <label for="month3">в течение 3-х месяцев</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="month6" required value="month6" v-model="housingStock3">
                <label for="month6">через полгода</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="month12" required value="month12" v-model="housingStock4">
                <label for="month12">через год</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="afterSale" required value="afterSale" v-model="housingStock5">
                <label for="afterSale">после продажи своего жилья</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="notDecided" required value="notDecided" v-model="housingStock6">
                <label for="notDecided">еще не определился</label>
            </div>

        </div>
    </div>
</template>

<script>
	export default {
		name: "EighthStep",
		computed: {
			housingStock1: {
				get() {
					return this.$store.state.form.EighthStep.month1
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'month1',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock2: {
				get() {
					return this.$store.state.form.EighthStep.month3
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'month3',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock3: {
				get() {
					return this.$store.state.form.EighthStep.month6
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'month6',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock4: {
				get() {
					return this.$store.state.form.EighthStep.month12
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'month12',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock5: {
				get() {
					return this.$store.state.form.EighthStep.afterSale
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'afterSale',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			}
			,
			housingStock6: {
				get() {
					return this.$store.state.form.EighthStep.notDecided
				},
				set(value) {
					let obj = {
						input: 'EighthStep',
						name: 'notDecided',
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