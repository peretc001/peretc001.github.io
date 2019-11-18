<template>
  <div class="home">
    <div class="home__left">
      <p>
        Поможем вас найти по всей России
      </p>
      <h1>Адресные таблички</h1>
      <b-button to="/step1" variant="success">Создать таличку</b-button>
    </div>
    <img src="http://vyveski05.ru/wp-content/uploads/2017/03/BS-220-5.jpg" alt="">
  </div>
</template>

<script>
export default {
  name: 'home'
}
</script>

<style lang="css" scoped>
  .home {
    padding: 0 calc(50vw - 550px);
  }
  @media (max-width: 1199.98px){
    .home {
      padding: 0 calc(50vw - 460px);
    }
  }
  @media (max-width: 991.98px){
    .home {
      padding: 0 calc(50vw - 350px);
    }
    .home h1 {
      font-size: 2em;
    }
    .home img {
      max-width: 300px
    }
  }

  @media (max-width: 767.98px){
    .home {
      padding: 0 15px;
      flex-direction: column-reverse;
      justify-content: center;
      text-align: center;
    }
    .home img {
      margin-left: 0;
      margin-bottom: 2em;
    }
  }

  
</style>