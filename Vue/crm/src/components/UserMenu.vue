<template>
   <div class="user-menu ml-auto">
      <b-dropdown>
         <template v-slot:button-content>
            <img src='/img/manager/manager.svg' alt='' />
            <span class="d-none d-lg-inline-block">Сидоров Сергей</span>
         </template>
         <b-dropdown-item href="#">
            <i class="mdi mdi-account"></i> Мой профиль
         </b-dropdown-item>
         <b-dropdown-item href="#">
            <i class="mdi mdi-logout"></i> Выход
         </b-dropdown-item>
      </b-dropdown>
   </div>
</template>

<script>
   export default {
      name: 'UserMenu',
   }
</script>