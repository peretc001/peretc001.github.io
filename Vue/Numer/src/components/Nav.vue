<template>
   <nav class="nav">
      <div class="container">
         <b-navbar toggleable="md" type="default">
            <b-navbar-brand to="/">Logo</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
               <b-navbar-nav class="ml-auto">
               <b-nav-item to="/step1">Калькулятор</b-nav-item>
               <b-nav-item to="/about">О компании</b-nav-item>
               <b-nav-item href="tel:88001112233"><span class="phone">8 800 111 22 33</span></b-nav-item>
               </b-navbar-nav>
            </b-collapse>
         </b-navbar>
      </div>
   </nav>
</template>

<script>
export default {
  name: 'Nav'
}
</script>
