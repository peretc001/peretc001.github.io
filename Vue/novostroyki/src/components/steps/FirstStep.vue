<template>
    <div class="container">
        <div class="form__title">
            Квартиры от застройщиков в Краснодаре по 214 ФЗ
        </div>
        <div class="form__caption">
            <p>Устали искать квартиру?</p>
            <p>Найдем за 15 минут! <span>Просто отправьте нам запрос!</span></p>
        </div>

        <button class="stepStart" @click="go">Отправить запрос</button>

        <div class="counter-building">
            <div class="counter-building__text">
                Сейчас в нашей базе 
            </div>
            <div class="counter-building__number">{{ countBuildings }} <span>квартир</span></div>
        </div>
    </div>
</template>

<script>
	export default {
        name: "FirstStep",
        data: () => ({
            countBuildings: 0,
        }),
        beforeMount() {
            let max = 69000;
            let min = 62000;
            this.countBuildings = new Intl.NumberFormat().format(Math.floor(Math.random() * (max - min)) + min);
        },
        methods: {
            go() {
                this.$router.push('/SecondStep');
            },
        }
	}
</script>

<style scoped>
    .form__title {
        font-size: 60px;
        line-height: 1.1;
        color: #fff;
        margin-bottom: 30px;
    }
    .form__caption {
        margin-bottom: 30px;
    }
    .form__caption p {
        font-size: 1.3em;
        margin: 0;
        margin-bottom: .5em;
        color: #ffffff;
    }
    .form__caption span {
        margin-top: .5em;
        display: block;
    }

    .stepStart {
        background: #a92a2a;
        width: 200px;
        padding: .5em 1em;
        cursor: pointer;
        border: 0;
        font-size: 18px;
        color: #fff;
        margin-bottom: 2em;
    }

    .stepStart:focus {
        outline: 0;
    }

    .counter-building {
        color: #ffffff;
    }

    .counter-building__number {
        font-size: 36px;
    }

    .counter-building__text {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .counter-building__number span {
        font-size: 16px;
    }

    @media only screen and (max-width: 1199.98px) {

        .form__title {
            font-size: 42px;
        }

    }
    @media only screen and (max-width: 991.98px) {
        .form__title {
            font-size: 32px;
        }
    }

    @media only screen and (max-width: 576.98px) {

        .form__title {
            font-size: 1.4em;
            text-align: center;
            line-height: 1.4;
            max-width: 300px;
            margin: 0 auto;
            margin-bottom: 30px;
        }
        .form__caption {
            text-align: center;
            margin-bottom: 2em;
        }
        .form__caption p {
            font-size: 1em;
        }
        .stepStart {
            display: block;
            margin: 0 auto;
            margin-bottom: 2em;
        }
        .counter-building {
            text-align: center;
        }

        .counter-building__number {
            font-size: 1.4em;
            text-align: center;
        }

        .counter-building__text {
            font-size: .9em;
            text-align: center;
        }

    }

</style>
