<template>
    <div class="container">
        <form class="result-request" @submit="sendEmail">
            <div class="result-request__number">
                <h3>По вашему запросу найдено <span>{{countBuildings}} квартир</span></h3>
                <p>Для получения информации по подобранным квартирам введите номер телефона</p>
            </div>
            <div class="form-group">
                <input type="tel" class="result-request__phone" v-mask="'+7 (###) ###-##-##'" v-model="phone" placeholder="Телефон" ref="setPhone" @input="inputPhone($event.target.value)" @mouseover="mouseover" @mouseleave="mouseleave" required/>
                <button class="result-request__submit" :disabled="disabled"> Отправить заявку </button>
            </div>
            <p class="result-request__text">В течении 10 минут менеджер подготовит несколько лучших предложений и свяжется с Вами</p>
            <div class="other">
                <p class="other_first">
                    или
                </p>
                <p class="other_second">
                    позвоните нам по телефону <a href="tel:89952204088" :click="ya()">8 (995) 220-40-88</a>
                </p>
                <p class="other_third">
                    Номер вашей заявки <span>{{numberRequest}}</span>
                </p>
            </div>
        </form>
        <div class="responce_good">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojRkZGRkZGIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" />
            <p><b>Благодарим за заявку!</b></p>
            <p>В течении 10 минут менеджер подготовит несколько лучших предложений и свяжется с Вами.</p>
            <p>Или вы можете позвонить нашим специалистам прямо сейчас <a href="tel:89952204088" :click="ya()">8 (995) 220-40-88</a></p>
        </div>
    </div>
</template>

<script>

    const axios = require('axios')

    export default {
        name: "SixthStep",
        data: () => ({
            countBuildings: 0,
            phone: '',
            numberRequest: 0,
            disabled: true
        }),
        beforeMount() {
            let max = 105;
            let min = 110;
            this.countBuildings = new Intl.NumberFormat().format(Math.floor(Math.random() * (max - min)) + min);
            this.numberRequest = new Intl.NumberFormat().format(Math.floor(Math.random() * (13000 - 10000)) + 10000);
        },
        methods: {
            ya() {
                ym(56345998, 'reachGoal', 'click_phone_step6')
            },
            mouseover() {
                this.$refs.setPhone.placeholder = '+7'
            },
            mouseleave() {
                this.$refs.setPhone.placeholder = 'Телефон'
            },
            inputPhone(val) {
                if (this.$refs.setPhone.value == '+7 (8') {
                  this.phone = '+7 ('
                }
                if (this.$refs.setPhone.value.length == 18) {
                    this.disabled = false
                } else {
                    this.disabled = true
                }
            },
            sendEmail() {
                
                event.preventDefault();
                axios.post('thankyou.php', {
                    data: { all: this.$store.state, phone: this.phone }
                }).then(function (response) {
                    console.log(response.data)
                    if (response.data.answer === 'good') {

                        ym(56345998, 'reachGoal', 'step5')

                        let thisStep = document.querySelector('.result-request')
                        let thisAnswer = document.querySelector('.responce_good')
                        thisStep.classList.add('done');
                        setTimeout(() => {
                            thisStep.classList.remove('done');
                            thisStep.classList.add('hide');
                            thisAnswer.classList.add('done');
                        }, 500);
                            thisAnswer.classList.add('show');
                    }
                }).catch(function (error) {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>
    .container {
        transform: translateY(-25px);
        position: relative;
    }

    .responce_good {
        text-align: center;
        display: none;
        color: #ffffff;
        font-size: 1em;
        opacity: 0;
        transition: opacity 1s ease;
        padding-top: 20px;
        text-align: center;
    }
    .responce_good.done {
        display: block;
    }
    .responce_good.show {
        opacity: 1;
    }

    .responce_good img {
        width: 100px;
        margin-bottom: .5em;
    }
    .responce_good b {
        font-size: 1.6em;
    }
    .responce_good a {
        display: block;
        text-align: center;
        font-weight: bold;
        margin-top: 0.5em;
        color: #ffffff;
        text-decoration: none;
        font-size: 1.3em;
    }



    .result-request {
        text-align: center;
        color: white;
        transition: opacity .3s ease;
    }
    .result-request.done {
        opacity: 0;
    }
    .result-request.hide {
        display: none;
    }

    .result-request__number h3 {
        font-size: 38px;
        margin-bottom: 30px;
        font-weight: normal;
    }
    .result-request__number h3 span {
        display: block;
    }
    .result-request__number p {
        max-width: 500px;
        margin: 0 auto;
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .form-group {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }
    .result-request__phone,
    .result-request__submit {
        background: #ffffff;
        border: 0;
        color: #000;
        padding: 10px;
        font-size: 20px;
        border-radius: 4px;
        max-width: 250px;
        text-align: center;
    }
    .result-request__phone::-webkit-input-placeholder {
        color: #888 !important;
    }

    .result-request__phone:-moz-placeholder {
	    color: #888 !important;
    }

    .result-request__phone::-moz-placeholder {
	    color: #888 !important;
    }

    .result-request__phone:-ms-input-placeholder {
	    color: #888 !important;
    }

    .result-request__phone:focus {
        outline: 0;
    }

    .result-request__submit {
        background: #a92a2a;
        cursor: pointer;
        color: #fff;
        padding: 10px 15px;
        margin-left: 1em;
        user-select: none
    }
    .result-request__submit:disabled {
        opacity: .5
    }

    .result-request__text {
        flex: 1 1 auto;
        max-width: 450px;
        margin: 0 auto;
        margin-bottom: 1em;
        font-size: 18px;
    }

    .other {
        font-size: 1em;
    }
    .other_first {
        font-size: 2em;
    }
    .other_second {
        font-size: 1.4em;
        margin: 0;
        margin-bottom: 0.3em;
    }
    .other_second a {
        color: #ffffff;
    }
    .other_third{
        font-size: 1.1em;
        margin: 0;
    }
    .other_third span {
        font-weight: bold;
    }
    


    @media only screen and (max-width: 1199.98px) {

        .container {
            transform: translateY(-25px)
        }
        .result-request__number h3 {
            font-size: 30px;
        }
        .other {
            font-size: .8em;
        }
        .other_first {
            font-size: 1.5em;
            margin-bottom: .5em;
        }
    }

    @media screen and (max-width: 991.98px) {

        .result-request__phone,
        .result-request__submit {
            font-size: 16px;
        }

    }

    @media screen and (max-width: 767.98px) {

        .result-request__number h3 {
            font-size: 1.4em;
            margin-bottom: 1em;
            margin-top: 0;
        }

    }

    @media screen and (max-width: 576.98px) {
        .responce_good {
            padding-top: 10px;
        }
        .responce_good img {
            width: 80px;
            margin-bottom: .5em;
        }
        .responce_good b {
            font-size: 1.4em;
        }
        .container {
            padding-top: 0;
            transform: translateY(0)
        }
        .result-request__number p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-group {
            flex-wrap: wrap;
            margin-bottom: .5em;
        }
        .result-request__phone,
        .result-request__submit {
            box-sizing: border-box;
            width: 100%;
            max-width: 300px;
            margin: 0;
            margin-bottom: 0.5em;
            width: 100%;
        }

        .result-request__text {
            font-size: .7em;
            margin-bottom: .5em;
        }
        .other {
            font-size: 0.6em;
            margin-bottom: 0;
        }
        .other a {
            font-size: 1.3em;
            display: block;
            margin: 0 auto;
            text-align: center;
            margin-bottom: .5em;
        }
    }

    @media screen and (max-width: 374.98px) {
        .container {
            transform: translateY(-10px)
        }
        .result-request__number h3 {
            font-size: 1.3em;
        }
        .responce_good b {
            font-size: 1.3em;
        }
        .responce_good p {
            font-size: .9em;
        }
    }

    

</style>
