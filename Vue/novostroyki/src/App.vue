<template>
    <div id="app">
        <Modal v-if="showModal" @close="showModal = false" :text="textModal"/>
        
        <div class="phone"><a href="tel:89181234455">8 (918) 123 44 55</a></div>
        <div class="step">
            <div class="step-current">{{currentStep}}</div>
            <div class="step-max">{{maxStep}}</div>
        </div>
        <div class="form">
<!--            <transition name="fade">-->
            <router-view/>
<!--            </transition>-->
            <Buttons :step="this.$route.meta.step" :showModal="showModal" @showModalEdit="showModalErr"/>
        </div>

        <div class="author-img">
            <span>Автор изображения</span><br>
            anatolylobov
        </div>

        <div class="counter-building">
            <div class="counter-building__number">{{countBuildings }}</div>
            <div class="counter-building__text">Сейчас в нашей базе квартир<br>
                Ежедневно количество квартир меняется
            </div>
        </div>
    </div>
</template>

<script>
    import Buttons from './components/Buttons'
    import Modal from './components/modal'

    export default {
        name: 'App',
        components: {Buttons, Modal},
        data: () => ({
            maxStep: 10,
            countBuildings: 0,
            showModal: false,
            textModal: "Выберите хотя бы один вариант"
        }),
        beforeMount() {
            let max = 69000;
            let min = 62000;
            this.countBuildings = new Intl.NumberFormat().format(Math.floor(Math.random() * (max - min)) + min);
        },
        created() {
            if (this.$store.state.form.SecondStep.newFlat === false || this.$store.state.form.SecondStep.secondaryFlat === false) {
                this.$router.push('/');
            }
        },
        computed: {
            currentStep() {
                return this.$route.meta.step;
            }
        },
        methods: {
            showModalErr() {
                this.showModal = true;
            }
        },
    }
</script>

<style>
    html,body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }

    #app {
        background: url('./assets/background.png') center center no-repeat;
        background-size: cover;
        height: 100%;
        position: relative;
    }

    #app:before {
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        position: absolute;
    }

    .container {
        padding: 0 50px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
        height: 100%;
    }


    .phone {
        font-size: 24px;
        line-height: 14px;
        color: #FFFFFF;
        position: absolute;
        right: 50px;
        top: 30px
    }
    .phone a {
        color: #fff;
        text-decoration: none;
    }

    .step {
        color: #ffffff;
        position: absolute;
        max-width: 60px;
        width: 100%;
        left: 40px;
        top: 50%;
        transform: translate(0, -50%);
        text-align: right;
    }

    .step-current {
        font-size: 64px;
        border-bottom: 1px solid #ffffff;
        padding: 5px;
    }

    .step-max {
        font-size: 16px;
        padding: 5px;
    }

    .author-img {
        font-size: 12px;
        color: #ffffff;
        position: absolute;
        left: 50px;
        bottom: 28px;
    }

    .counter-building {
        color: #ffffff;
        position: absolute;
        right: 50px;
        bottom: 31px;
    }

    .counter-building__number {
        font-size: 36px;
        margin-bottom: 10px;
        text-align: right;
    }

    .counter-building__text {
        font-size: 18px;
        text-align: right;
    }

    .form {
        max-width: 900px;
        margin: auto;
        position: relative;
        top: 50%;
        transform: translate(0, -50%);
        min-height: 450px;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .form__title {
        font-size: 48px;
        color: #fff;
        margin-bottom: 34px;
    }

    .form__items {
        margin-bottom: 20px;
    }

    .form__item {
        color: white;
        font-size: 18px;
        margin-bottom: .5em;
    }

    .form__item input[type=checkbox] + label {
        display: block;
        margin: 0.2em;
        cursor: pointer;
        padding: 0;
        padding-left: 2em;
        position: relative;
        user-select: none
    }

    .form__item input[type=checkbox] {
        display: none;
    }

    .form__item input[type=checkbox] + label:before {
        content: "\2714";
        position: absolute;
        left: 0;
        top: 0;
        border: 0.1em solid #fff;
        border-radius: 0.2em;
        /* display: inline-block; */
        width: 1em;
        height: 1em;
        font-size: 1em;
        line-height: 1;
        /* padding-left: 0.2em;
        padding-bottom: 0.3em;
        margin-right: 10px;
        vertical-align: bottom; */
        color: transparent;
        transition: .2s;
    }

    .form__item input[type=checkbox] + label:active:before {
        transform: scale(0);
    }

    .form__item input[type=checkbox]:checked + label:before {
        background-color: #4DBA4B;
        border-color: #4DBA4B;
        color: #fff;
        text-align: center;
    }

    .form__button {
        padding-left: 50px
    }
	


    @media only screen and (max-width: 1023px) {
        .form {
            padding: 0 20px;
            top: 50%
        }

        /* .step {
            top: 20%;
        } */

        .form__title {
            font-size: 34px;
        }

        .container {
            padding: 0 100px;
        }
        .form__button {
            padding-left: 90px;
        }
    }

    @media only screen and (max-width: 812px) {

        .form__atp {
            margin-bottom: 15px !important;
        }

        .step {
            display: none;
        }

        .form {
            min-height: 230px;
        }

        .phone {
            font-size: 16px;
            right: 20px;
            top: 20px;
        }

        .counter-building {
            right: 20px;
            bottom: 20px;
        }

        .counter-building__number {
            font-size: 22px;
            margin-bottom:0;
        }
        .counter-building__text {
            font-size: 16px;
        }

        .author-img {
            left: -10px;
            bottom: 35px;
            font-size: 10px;
            transform: rotate(90deg);
        }
        .author-img span {
            display: none;
        }

        .form__title {
            font-size: 24px;
            margin-bottom: 24px;
        }

        .form-items {
            flex-wrap: nowrap;
        }

        .form__item {
            font-size: 14px;
            width: 100%;
        }
    }

    @media screen and (max-width: 576.98px) {
        #app {
            min-height: 500px;
        }
        .form {
            top: 48%;
            padding: 0;            
        }
        .container {
            padding: 0 30px
        }
        .form__button {
            padding-left: 30px;
        }
        .modal-container {
            max-width: 80%;
            margin: 0 auto;
        }
        .form__item input[type=checkbox] + label:before {
            font-size: .8em;
            padding: .3em;
        }
        .result-request__number {
            font-size: 20px !important;
        }
        .counter-building__number {
            font-size: 26px;
        }

        .counter-building__text {
            font-size: 12px;
            text-align: right;
        }

    }

</style>
