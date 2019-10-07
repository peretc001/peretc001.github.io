import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        form: {
            SecondStep: {
                newFlat:false,
                secondaryFlat:false,
            },
            ThirdStep: {
                StudioApartment:false,
                flat1:false,
                flat2:false,
                flat3:false,
                flat4:false,
                more4flat:false,
            },
            FourthStep: {
                allDistrict:false,
                fmrDistrict:false,
                cmrDistrict:false,
                enkaDistrict:false,
                kmrDistrict:false,
                kkbDistrict:false,
                gmrDistrict:false,
                chmrDistrict:false,
                ymrDistrict:false,
                ripDistrict:false,
                pmrDistrict:false,
                naberegDistrict:false,
                vitaminDistrict:false,
            },
            FifthStep: {
                finished:false,
                surrenderYear:false,
                Year20:false,
                Year21:false,
                Year22:false,
            },
            SixthStep: {
                do1mln:false,
                do1_5mln:false,
                do3mln:false,
                do4mln:false,
                do5mln:false,
            },
            SeventhStep: {
                cash:false,
                mortgage:false,
                installments:false,
                capital:false,
                militaryMortgage:false,
            },
            EighthStep: {
                month1:false,
                month3:false,
                month6:false,
                month12:false,
                afterSale:false,
                notDecided:false,
            },
        }
    },
    mutations: {
        updateForm(state, obj) {
            state.form[obj.input][obj.name] = obj.value
        }
    },
    actions: {},
    getters: {}
})
