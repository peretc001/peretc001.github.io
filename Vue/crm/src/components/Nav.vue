<template>
   <header class="main-header" id="header">
	   <nav class="navbar">
         <a class="btn btn-secondary nav-link" href="/home.php">
            <i class="fas fa-home"></i> 
            <span class="d-none d-md-inline-block">Главная</span>
         </a>
		   <a class="btn btn-secondary nav-link" href="/company_add.php">
            <i class="fas fa-plus-circle"></i> 
            <span class="d-none d-md-inline-block">Добавить</span>
         </a>
         <button class="show_filter btn btn-success nav-link">
            <i class="fas fa-search d-none d-md-inline-block"></i> 
            Ф<span class="d-none d-md-inline-block">ильтр</span> 
            <i class="fas fa-caret-up"></i>
         </button>
		   <input type="search" id="search" class="form-control ml-auto" placeholder="Быстрый поиск" autocomplete="off">
         <UserMenu />
	   </nav>
   </header>
</template>

<script>
import UserMenu from './UserMenu.vue'

   export default {
      name: 'Nav', 
      components: {
         UserMenu
      }
   }
</script>