<template>
    <div class="container">
        <form class="result-request" @submit="sendEmail">
            <div class="result-request__number">Заявка № {{numberRequest}}</div>
            <div class="result-request__info">
                <div class="result-request__info-number">{{countBuildings}}</div>
                <div class="result-request__info-text">найдено квартир согласно заданным параметрам</div>
            </div>
            <div class="result-request__form">
                <div class="result-child">
                    <div class="result-request__form-item">
                        <label>Ваш контактный телефон</label>
                        <input type="tel" class="result-request__form-phone" v-mask="'+7 (###) ###-##-##'" v-model="phone" placeholder="+7 (xxx) xxx-xx-xx" ref="setPhone" @input="inputPhone($event.target.value)" required />
                    </div>
                    <div class="result-request__form-text">В течении 10 минут менеджер подготовит несколько лучших предложений и свяжется с Вами</div>
                </div>

            </div>
            <button class="result-request__submit"> Отправить заявку </button>
        </form>
        <div class="responce_good">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIGNsYXNzPSIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojRkZGRkZGIj48L3BhdGg+Cgk8cGF0aCBkPSJNMzguMjUyLDE1LjMzNmwtMTUuMzY5LDE3LjI5bC05LjI1OS03LjQwN2MtMC40My0wLjM0NS0xLjA2MS0wLjI3NC0xLjQwNSwwLjE1NmMtMC4zNDUsMC40MzItMC4yNzUsMS4wNjEsMC4xNTYsMS40MDYgICBsMTAsOEMyMi41NTksMzQuOTI4LDIyLjc4LDM1LDIzLDM1YzAuMjc2LDAsMC41NTEtMC4xMTQsMC43NDgtMC4zMzZsMTYtMThjMC4zNjctMC40MTIsMC4zMy0xLjA0NS0wLjA4My0xLjQxMSAgIEMzOS4yNTEsMTQuODg1LDM4LjYyLDE0LjkyMiwzOC4yNTIsMTUuMzM2eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6I0ZGRkZGRiI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" />
            <p><b>Благодарим за заявку!</b></p>
            <p>В течении 10 минут менеджер подготовит несколько лучших предложений и свяжется с Вами.</p>
            <p>Или вы можете позвонить нашим специалистам прямо сейчас <a class="result-request__phone" href="tel:89181234455">8 (918) 123 44 55</a></p>
        </div>
    </div>
</template>

<script>

    const axios = require('axios')


    export default {
        name: "TenthStep",
        data: () => ({
            countBuildings: 0,
            phone: '',
            numberRequest: 0
        }),
        beforeMount() {
            let max = 200;
            let min = 350;
            this.countBuildings = new Intl.NumberFormat().format(Math.floor(Math.random() * (max - min)) + min);
            this.numberRequest = new Intl.NumberFormat().format(Math.floor(Math.random() * (13000 - 10000)) + 10000);
        },
        methods: {
            inputPhone(val) {
                if (this.$refs.setPhone.value == '+7 (8') {
                  this.phone = '+7 ('
                }
            },
            sendEmail() {
                event.preventDefault();
                axios.post('/work/vue/novostroyki/thankyou.php', {
                    data: { all: this.$store.state, phone: this.phone }
                }).then(function (response) {
                    console.log(response.data)
                    if (response.data.answer === 'good') {
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
    .responce_good {
        text-align: center;
        display: none;
        color: #ffffff;
        font-size: 1em;
        opacity: 0;
        transition: opacity 1s ease;
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
    }

    .result-request {
        color: white;
        transition: opacity .3s ease;
    }
    .result-request.done {
        opacity: 0;
    }
    .result-request.hide {
        display: none;
    }

    .result-request__number {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .result-request__info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    /* .result-request__info-number {
        font-size: 36px;
        margin-right: 20px;
    } */
    .result-request__info-number {
        font-size: 36px;
        background: #fff;
        padding: 10px;
        color: #4DBA4B;
        margin-right: 20px;
    }

    .result-request__info-text {
        max-width: 222px;
        font-size: 18px;
    }

    .result-request__form-item {
        display: flex;
        flex-direction: column;
        max-width: 380px;
        margin-bottom: 20px;
    }

    .result-request__form-item label {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .result-request__form-phone {
        /* background: unset;
        border: 0;
        border-bottom: 1px solid #fff;
        color: #fff;
        padding-bottom: 5px;
        font-size: 18px; */
        background: #ffffff;
        border: 0;
        color: #4DBA4B;
        padding-bottom: 5px;
        font-size: 20px;
        border-radius: 4px;
        padding: 8px;
        max-width: 200px;
        text-align: center;
    }
    .result-request__form-phone::-webkit-input-placeholder {
        text-transform: uppercase;
        color: #4DBA4B !important;
    }

    .result-request__form-phone:-moz-placeholder {
	text-transform: uppercase;
	color: #4DBA4B !important;
    }

    .result-request__form-phone::-moz-placeholder {
	text-transform: uppercase;
	color: #4DBA4B !important;
    }

    .result-request__form-phone:-ms-input-placeholder {
	text-transform: uppercase;
	color: #4DBA4B !important;
    }

    .result-request__form-phone:focus {
        outline: 0;
    }

    .result-request__form-text {
        flex: 1 1 auto;
        max-width: 450px;
        margin-bottom: 1em;
        font-size: 18px;
    }

    .result-request__phone {
        color: white;
        text-decoration: none;
        margin-bottom: 20px;
        font-size: 18px;
        display: inline-block;
    }

    .result-request__submit {
        background: #4DBA4B;
        width: 180px;
        height: 40px;
        cursor: pointer;
        border: 0;
        font-size: 18px;
        color: #fff;
    }


    @media only screen and (max-width: 1099.98px) {

        .container {
            padding-left: 150px;
        }
        .result-request__number {
            font-size: 30px;
        }
    }

    @media only screen and (max-width: 1023.98px) {

        .container {
            padding-left: 150px;
        }
        .result-request__number {
            font-size: 30px;
        }
    }

    @media only screen and (max-width: 700px) {

        .container {
            padding-left: 50px;
        }
        .result-request__submit {
            font-size: 1em;
        }
        .responce_good {
            font-size: 0.9em;
        }

    }

    @media screen and (max-width: 576.98px) {
        .container {
            padding-left: 30px;
        }
        .result-request__form-text {
            max-width: auto;
            font-size: 14px !important;
        }
    }

</style>
