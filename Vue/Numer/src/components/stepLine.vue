<template>
   <div class="stepLine">
      <div class="container">
         <div class="stepLine__row">
            <div class="stepLine__row__item">
               <router-link to="/step1">&nbsp;</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step2">&nbsp;</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step3">&nbsp;</router-link>
            </div>
            <div class="stepLine__row__item">
               <router-link to="/step4">&nbsp;</router-link>
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
