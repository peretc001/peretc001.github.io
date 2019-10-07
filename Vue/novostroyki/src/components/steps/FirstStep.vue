<template>
    <div class="container">
        <div class="form__atp">
            Вам потребуется несколько минут для получения лучших
            предложений квартир в новостройках города
        </div>
        <div class="form__title">
            Бесплатная база
            новостроек Краснодара
        </div>
    </div>
</template>

<script>
	export default {
		name: "FirstStep"
	}
</script>

<style scoped>
    .form__atp {
        font-size: 16px;
        line-height: 19px;
        color: #ffff;
        max-width: 450px;
        margin-bottom: 40px;
    }

    .form__title {
        font-size: 48px;
        color: #fff;
        margin-bottom: 34px;
    }

    @media only screen and (max-width: 812px) {

        .form__title {
            font-size: 32px;
        }

    }

</style>
