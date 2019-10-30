<template>
   <div>
      <div v-if="preloader" class="chatListItem preloader">
         <div class="chatListItem_img"></div>
         <div class="chatListItem_body">
            <p class="placeholder_text"></p>
            <p class="placeholder_text"></p>
            <p class="placeholder_text"></p>
         </div>
      </div>
      <div class="fade" :class="{ 'show': preloader }">
         <div :class="{ 'active': chatListItem.chat.id_url == currentIdChat, 'show': preloader }" v-for="(chatListItem, i) in chatList" :key="i" class="chatListItem" @click="setChat(chatListItem.chat.id_url)">
            <div class="chatListItem_img">
               <img :src="chatListItem.offers.img">
            </div>
            <div class="chatListItem_body">
               <p class="chatListItem_body__user">
                  <b>{{ chatListItem.author.name }}</b>
                  {{ chatListItem.offers.title }}
                  </p>
               <p class="chatListItem_body__price">{{ chatListItem.offers.price }}</p>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: 'List',
   props: [
    'chatList',
    'countChat',
    'currentIdChat',
    'preloader'
  ],
  data() {
     return {
        counter: 0
     }
  },
  methods: {
      setChat (url) {
         this.$emit('setChat', url)
      }
   }
}
</script>