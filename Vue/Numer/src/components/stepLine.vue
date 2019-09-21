<template>
   <div class="stepLine">
      <div class="container">
         <div class="stepLine__row">
            <div class="stepLine__row__item">
               <router-link to="/step1">Step1</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step2">Step2</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step3">Step3</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step4">Step4</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step5">Step5</router-link>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
export default {
  name: 'stepLine'
}
</script>
