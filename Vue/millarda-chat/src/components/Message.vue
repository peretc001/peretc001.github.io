<template>
   <div>
      <div v-if="preloader" class="msgItem">
         123
      </div>
      <div class="msgItem" :class="{ 'show': preloader }">
         <div v-show="!preloader" v-for="(msgItem, i) in msg" :key="i">
            <p class="msgItem__date">{{ i }}</p>
            <div v-for="(msgUser, j) in msgItem" :key="j" class="msgItem__text" :class="{ 'author': msgUser.user }">
               <div class="msgItem__msg">
                  <div class="msgItem__time">{{ msgUser.created }}</div>
                  <p>{{ msgUser.messages }}</p>
               </div>
            </div>
         </div>
      </div>
      <div class="msgAdd">
         <input type="text" name="" placeholder="Написать сообщение" />
      </div>
   </div>
</template>

<script>

export default {
   name: 'Message',
   props: [
      'msg',
      'preloader'
   ],
   data () {
      return {
         img: require('@/assets/810.gif'),
      }
   }
}
</script>
