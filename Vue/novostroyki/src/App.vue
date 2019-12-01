<template>
    <div id="app">
        <Modal v-if="showModal" @close="showModal = false" :text="textModal"/>
        
        <div class="contact_top">
            <p>Краснодар, ул. Юнатов, 23</p>
            <p><a href="mailto:svetlanaanasimova@yandex.ru">svetlanaanasimova@yandex.ru</a></p>
            <p class="phone"><a href="tel:89952204088" :click="ya">8 (995) 220-40-88</a></p>
        </div>
        <div class="step">
            <div class="step-current">{{currentStep}}</div>
            <div class="step-max">{{maxStep}}</div>
        </div>
        <div class="form">
            <router-view/>
            <Buttons :step="this.$route.meta.step" :showModal="showModal" @showModalEdit="showModalErr"/>
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
            maxStep: 6,
            showModal: false,
            textModal: "Выберите хотя бы один вариант"
        }),
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
            ya() {
                ym(56345998, 'reachGoal', 'click_phone_header')
            },
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
        min-height: 580px;
        position: relative;
    }

    #app:before {
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
    }
    
    .contact_top {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: #ffffff;
        position: relative;
        padding: 20px 50px;
    }
    .contact_top p {
        margin: 0;
        margin-right: 3em;
    }
    .contact_top p:last-child {
        margin: 0;
        margin-right: 0;
    }
    .contact_top p a, .contact_top p a:hover {
        color: #ffffff;
        text-decoration: none;
        position: relative;
    }
    .contact_top .phone a {
        padding-left: 1.3em;
        font-size: 1.2em;
        font-weight: bold;
    }
    .contact_top .phone a:before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 1em;
        height: 1em;
        background-size: 1em;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDgwLjU2IDQ4MC41NiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDgwLjU2IDQ4MC41NjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNjUuMzU0LDMxNy45Yy0xNS43LTE1LjUtMzUuMy0xNS41LTUwLjksMGMtMTEuOSwxMS44LTIzLjgsMjMuNi0zNS41LDM1LjZjLTMuMiwzLjMtNS45LDQtOS44LDEuOCAgICBjLTcuNy00LjItMTUuOS03LjYtMjMuMy0xMi4yYy0zNC41LTIxLjctNjMuNC00OS42LTg5LTgxYy0xMi43LTE1LjYtMjQtMzIuMy0zMS45LTUxLjFjLTEuNi0zLjgtMS4zLTYuMywxLjgtOS40ICAgIGMxMS45LTExLjUsMjMuNS0yMy4zLDM1LjItMzUuMWMxNi4zLTE2LjQsMTYuMy0zNS42LTAuMS01Mi4xYy05LjMtOS40LTE4LjYtMTguNi0yNy45LTI4Yy05LjYtOS42LTE5LjEtMTkuMy0yOC44LTI4LjggICAgYy0xNS43LTE1LjMtMzUuMy0xNS4zLTUwLjksMC4xYy0xMiwxMS44LTIzLjUsMjMuOS0zNS43LDM1LjVjLTExLjMsMTAuNy0xNywyMy44LTE4LjIsMzkuMWMtMS45LDI0LjksNC4yLDQ4LjQsMTIuOCw3MS4zICAgIGMxNy42LDQ3LjQsNDQuNCw4OS41LDc2LjksMTI4LjFjNDMuOSw1Mi4yLDk2LjMsOTMuNSwxNTcuNiwxMjMuM2MyNy42LDEzLjQsNTYuMiwyMy43LDg3LjMsMjUuNGMyMS40LDEuMiw0MC00LjIsNTQuOS0yMC45ICAgIGMxMC4yLTExLjQsMjEuNy0yMS44LDMyLjUtMzIuN2MxNi0xNi4yLDE2LjEtMzUuOCwwLjItNTEuOEM0MDMuNTU0LDM1NS45LDM4NC40NTQsMzM2LjksMzY1LjM1NCwzMTcuOXoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiIHN0eWxlPSJmaWxsOiNGRkZGRkYiPjwvcGF0aD4KCQk8cGF0aCBkPSJNMzQ2LjI1NCwyMzguMmwzNi45LTYuM2MtNS44LTMzLjktMjEuOC02NC42LTQ2LjEtODljLTI1LjctMjUuNy01OC4yLTQxLjktOTQtNDYuOWwtNS4yLDM3LjEgICAgYzI3LjcsMy45LDUyLjksMTYuNCw3Mi44LDM2LjNDMzI5LjQ1NCwxODguMiwzNDEuNzU0LDIxMiwzNDYuMjU0LDIzOC4yeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgoJCTxwYXRoIGQ9Ik00MDMuOTU0LDc3LjhjLTQyLjYtNDIuNi05Ni41LTY5LjUtMTU2LTc3LjhsLTUuMiwzNy4xYzUxLjQsNy4yLDk4LDMwLjUsMTM0LjgsNjcuMmMzNC45LDM0LjksNTcuOCw3OSw2Ni4xLDEyNy41ICAgIGwzNi45LTYuM0M0NzAuODU0LDE2OS4zLDQ0NC4zNTQsMTE4LjMsNDAzLjk1NCw3Ny44eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=')
    }
    .container {
        padding: 0 50px;
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
        right: 50px;
        bottom: 28px;
        text-align: right;
    }

    .form {
        max-width: 900px;
        margin: auto;
        position: relative;
        top: 45%;
        transform: translate(0, -50%);
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
        padding-top: 1em;
        padding-left: 50px
    }
	


    @media screen and (max-width: 1199.98px) {
        .form {
            max-width: 800px;
        }
        .form__title {
            font-size: 34px;
        }
        .container {
            padding: 0 100px;
        }
        .form__button {
            padding-left: 100px
        }
    }

    @media screen and (max-width: 991.98px) {

        .contact_top {
            font-size: 0.8em;
            justify-content: space-between;
            padding: 20px 100px;
        }
        .contact_top p {
            margin: 0;
            margin-right: 1em;
        }
        .contact_top .phone a {
            padding-left: 1.1em;
        }
        .contact_top .phone a:before {
            width: .9em;
            height: .9em;
            background-size: .9em;
        }

        .step {
            display: none;
        }
        .form__items {
            margin-bottom: 0px;
        }
        .form__items.area .form__item {
            font-size: 1em;
        }
        .form__items.area .form__item span {
            display: none;
        }
        .form__button {
            padding-left: 100px;
        }

    }

    @media screen and (max-width: 767.98px) {
        .contact_top {
            font-size: 1em;
            flex-wrap: wrap;
            padding: 20px 50px;
        }
        .contact_top p {
            margin: 0;
            margin-right: 0;
            margin-bottom: .5em;
        }
        .contact_top .phone {
            width: 100%;
            text-align: right;
        }
        .container {
            padding: 0 50px;
        }
        .form__button {
            padding-left: 50px;
        }
    }

    @media screen and (max-width: 576.98px) {
        #app {
            min-height: 550px;
        }
        .container {
            transform: translateY(-50px)
        }
        .form {
            box-sizing: border-box;
        }
        .contact_top {
            justify-content: center;
            padding: 10px 30px;
            font-size: 0.9em;
        }
        .contact_top .phone {
            text-align: center;
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

        .counter-building__text {
            font-size: 12px;
            text-align: right;
        }

        .form__title {
            font-size: 1.3em;
            text-align: center;
            line-height: 1.5;
        }

        .form__items.area .form__item {
            font-size: .9em;
        }
        .form__items.area .form__item span {
            display: none;
        }
        .form__button {
            padding-left: 0;
            margin-left: 0;
            margin: 0 auto;
        }
    }

    @media screen and (max-width: 374.98px) {
        #app {
            font-size: 0.9em;
            min-height: 470px
        }
        .container {
            transform: translateY(-30px);
            min-height: auto;
        }
        .contact_top {
            padding: 10px 30px;
            font-size: 0.8em;
        }
        .form {
            top: 44%;
            height: auto;
            min-height: auto;
            justify-content: center;
        }
        .form__item {
            font-size: 16px;
        }
        .form__button {
            padding-top: 0;
        }
    }

</style>
