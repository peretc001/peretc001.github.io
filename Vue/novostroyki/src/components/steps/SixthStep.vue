<template>
    <div class="container">
        <div class="form__title">
            Какой бюджет Вы готовы потратить на покупку квартиры?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="do1mln" required  value="do1mln" v-model="housingStock1">
                <label for="do1mln">до 1 млн рублей</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="do1_5mln" required value="do1_5mln" v-model="housingStock2">
                <label for="do1_5mln">до 1,5 млн рублей</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="do3mln" required value="do3mln" v-model="housingStock3">
                <label for="do3mln">2-3 млн рублей</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="do4mln" required value="do4mln" v-model="housingStock4">
                <label for="do4mln">3-4 млн рублей</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="do5mln" required value="do5mln" v-model="housingStock5">
                <label for="do5mln">более 5 млн рублей</label>
            </div>

        </div>
    </div>
</template>

<script>
	export default {
		name: "SixthStep",
		computed: {
			housingStock1: {
				get() {
					return this.$store.state.form.SixthStep.do1mln
				},
				set(value) {
					let obj = {
						input: 'SixthStep',
						name: 'do1mln',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock2: {
				get() {
					return this.$store.state.form.SixthStep.do1_5mln
				},
				set(value) {
					let obj = {
						input: 'SixthStep',
						name: 'do1_5mln',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock3: {
				get() {
					return this.$store.state.form.SixthStep.do3mln
				},
				set(value) {
					let obj = {
						input: 'SixthStep',
						name: 'do3mln',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock4: {
				get() {
					return this.$store.state.form.SixthStep.do4mln
				},
				set(value) {
					let obj = {
						input: 'SixthStep',
						name: 'do4mln',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock5: {
				get() {
					return this.$store.state.form.SixthStep.do5mln
				},
				set(value) {
					let obj = {
						input: 'SixthStep',
						name: 'do5mln',
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