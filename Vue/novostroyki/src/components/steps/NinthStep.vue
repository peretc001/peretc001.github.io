<template>
    <div class="container">
        <div class="form__title">
            Подождите, мы осуществляем подбор квартир согласно заданным параметрам
        </div>
        <div class="loader">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45"/>
            </svg>
        </div>
    </div>
</template>

<script>
	export default {
		name: "NinthStep",
        created() {
			setTimeout(()=>{ this.$router.push({path: '/TenthStep'});},2500)
        }
	}
</script>

<style scoped>

    .form__title {
        font-size: 44px;
    }
    .loader {
        margin: auto;
        max-width: 100px;
        width: 100%;
    }

    svg {
        -webkit-animation: 2s linear infinite svg-animation;
        animation: 2s linear infinite svg-animation;
        max-width: 100px;
    }

    /* // SVG animation. */
    @keyframes svg-animation {
        0% {
            -webkit-transform: rotateZ(0deg);
            -ms-transform: rotate(0deg);
            transform: rotateZ(0deg);
        }
        100% {
            -webkit-transform: rotateZ(360deg);
            -ms-transform: rotate(360deg);
            transform: rotateZ(360deg);
        }
    }

    /* // Circle styles. */
    circle {
        -webkit-animation: 1.4s ease-in-out infinite both circle-animation;
        animation: 1.4s ease-in-out infinite both circle-animation;
        display: block;
        fill: transparent;
        stroke: #fff;
        stroke-linecap: round;
        stroke-dasharray: 283;
        stroke-dashoffset: 280;
        stroke-width: 10px;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }

    /* // Circle animation. */
    @-webkit-keyframes circle-animation {
        0%,
        25% {
            stroke-dashoffset: 280;
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        50%,
        75% {
            stroke-dashoffset: 75;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        100% {
            stroke-dashoffset: 280;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes circle-animation {
        0%,
        25% {
            stroke-dashoffset: 280;
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        50%,
        75% {
            stroke-dashoffset: 75;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        100% {
            stroke-dashoffset: 280;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @media only screen and (max-width: 812px) {
    .form__title {
        font-size: 24px;
    }
    }

</style>
