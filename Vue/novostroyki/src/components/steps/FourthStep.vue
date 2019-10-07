<template>
    <div class="container">
        <div class="form__title">
            Какой район города Вам интересен?
        </div>
        <div class="form__items">

            <div class="form__item">
                <input type="checkbox" id="allDistrict" required value="allDistrict" v-model="housingStock1">
                <label for="allDistrict">Все районы города</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="vitaminDistrict" required value="vitaminDistrict" v-model="housingStock13">
                <label for="vitaminDistrict"> Витаминкомбинат<span> - Район Витаминкомбината</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="naberegDistrict" required value="naberegDistrict" v-model="housingStock12">
                <label for="naberegDistrict"> Район Кубанской набережной</label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="cmrDistrict" required value="cmrDistrict" v-model="housingStock2">
                <label for="cmrDistrict"> ЦМР<span> - Центральный район</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="fmrDistrict" required value="fmrDistrict" v-model="housingStock3">
                <label for="fmrDistrict"> ФМР<span> - Фестивальный район</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="enkaDistrict" required value="enkaDistrict" v-model="housingStock4">
                <label for="enkaDistrict"> ЭНКА<span> - Район им.Маршала Жукова</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="kmrDistrict" required value="kmrDistrict" v-model="housingStock5">
                <label for="kmrDistrict"> КМР<span> - Комсомольский район</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="kkbDistrict" required value="kkbDistrict" v-model="housingStock6">
                <label for="kkbDistrict"> ККБ<span> - Краевой клинической больницы</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="gmrDistrict" required value="gmrDistrict" v-model="housingStock7">
                <label for="gmrDistrict"> ГМР<span> - Гидростроителей</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="chmrDistrict" required value="chmrDistrict" v-model="housingStock8">
                <label for="chmrDistrict"> ЧМР<span> - Район Черемушки</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="ymrDistrict" required value="ymrDistrict" v-model="housingStock9">
                <label for="ymrDistrict"> ЮМР<span> - Юбилейный район</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="ripDistrict" required value="ripDistrict" v-model="housingStock10">
                <label for="ripDistrict"> РИП<span> - Район Ленты (Шанхай)</span></label>
            </div>

            <div class="form__item">
                <input type="checkbox" id="pmrDistrict" required value="pmrDistrict" v-model="housingStock11">
                <label for="pmrDistrict"> ПМР<span> - Пашковский район</span></label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FourthStep",
        computed: {
            housingStock1: {
                get() {
                    return this.$store.state.form.FourthStep.allDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'allDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj);

                    if (value === true) {
                        this.$store.state.form.FourthStep.fmrDistrict = true
                        this.$store.state.form.FourthStep.cmrDistrict = true
                        this.$store.state.form.FourthStep.enkaDistrict = true
                        this.$store.state.form.FourthStep.kmrDistrict = true
                        this.$store.state.form.FourthStep.kkbDistrict = true
                        this.$store.state.form.FourthStep.gmrDistrict = true
                        this.$store.state.form.FourthStep.chmrDistrict = true
                        this.$store.state.form.FourthStep.ymrDistrict = true
                        this.$store.state.form.FourthStep.ripDistrict = true
                        this.$store.state.form.FourthStep.pmrDistrict = true
                        this.$store.state.form.FourthStep.naberegDistrict = true
                        this.$store.state.form.FourthStep.vitaminDistrict = true
                    } else {
                        this.$store.state.form.FourthStep.fmrDistrict = false
                        this.$store.state.form.FourthStep.cmrDistrict = false
                        this.$store.state.form.FourthStep.enkaDistrict = false
                        this.$store.state.form.FourthStep.kmrDistrict = false
                        this.$store.state.form.FourthStep.kkbDistrict = false
                        this.$store.state.form.FourthStep.gmrDistrict = false
                        this.$store.state.form.FourthStep.chmrDistrict = false
                        this.$store.state.form.FourthStep.ymrDistrict = false
                        this.$store.state.form.FourthStep.ripDistrict = false
                        this.$store.state.form.FourthStep.pmrDistrict = false
                        this.$store.state.form.FourthStep.naberegDistrict = false
                        this.$store.state.form.FourthStep.vitaminDistrict = false
                    }
                }
            },
            housingStock2: {
                get() {
                    return this.$store.state.form.FourthStep.fmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'fmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock3: {
                get() {
                    return this.$store.state.form.FourthStep.cmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'cmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock4: {
                get() {
                    return this.$store.state.form.FourthStep.enkaDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'enkaDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock5: {
                get() {
                    return this.$store.state.form.FourthStep.kmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'kmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock6: {
                get() {
                    return this.$store.state.form.FourthStep.kkbDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'kkbDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock7: {
                get() {
                    return this.$store.state.form.FourthStep.gmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'gmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock8: {
                get() {
                    return this.$store.state.form.FourthStep.chmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'chmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock9: {
                get() {
                    return this.$store.state.form.FourthStep.ymrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'ymrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock10: {
                get() {
                    return this.$store.state.form.FourthStep.ripDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'ripDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock11: {
                get() {
                    return this.$store.state.form.FourthStep.pmrDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'pmrDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock12: {
                get() {
                    return this.$store.state.form.FourthStep.naberegDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'naberegDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            },
            housingStock13: {
                get() {
                    return this.$store.state.form.FourthStep.vitaminDistrict
                },
                set(value) {
                    let obj = {
                        input: 'FourthStep',
                        name: 'vitaminDistrict',
                        value: value
                    };
                    this.$store.commit('updateForm', obj)
                }
            }
        }
    }
</script>

<style>
    .form__items {
        flex-wrap: wrap;
        display: flex;
    }

    .form__item {
        width: 50%;
    }

    @media only screen and (max-width: 600px) {
        span {
            display: none;
        }
    }
</style>
