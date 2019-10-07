<template>
    <div class="container">
        <div class="form__title">
            Какой год сдачи жилого комплекса Вам интересен?
        </div>
        <div class="form__items">
            <div class="form__item">
                <input type="checkbox" id="finished" required  value="finished" v-model="housingStock1">
                <label for="finished">готовое</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="surrenderYear" required value="surrenderYear" v-model="housingStock2">
                <label for="surrenderYear">сдача в этом году</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="Year20" required value="Year20" v-model="housingStock3">
                <label for="Year20"> 2020-2021 г</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="Year21" required value="Year21" v-model="housingStock4">
                <label for="Year21">2021-2022 г</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="Year22" required value="Year22" v-model="housingStock5">
                <label for="Year22">2022-2023 г</label>
            </div>

        </div>
    </div>
</template>

<script>
	export default {
		name: "FifthStep",
		computed: {
			housingStock1: {
				get() {
					return this.$store.state.form.FifthStep.finished
				},
				set(value) {
					let obj = {
						input: 'FifthStep',
						name: 'finished',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock2: {
				get() {
					return this.$store.state.form.FifthStep.surrenderYear
				},
				set(value) {
					let obj = {
						input: 'FifthStep',
						name: 'surrenderYear',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock3: {
				get() {
					return this.$store.state.form.FifthStep.Year20
				},
				set(value) {
					let obj = {
						input: 'FifthStep',
						name: 'Year20',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock4: {
				get() {
					return this.$store.state.form.FifthStep.Year21
				},
				set(value) {
					let obj = {
						input: 'FifthStep',
						name: 'Year21',
						value:value
					};
					this.$store.commit('updateForm', obj)
				}
			},
			housingStock5: {
				get() {
					return this.$store.state.form.FifthStep.Year22
				},
				set(value) {
					let obj = {
						input: 'FifthStep',
						name: 'Year22',
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