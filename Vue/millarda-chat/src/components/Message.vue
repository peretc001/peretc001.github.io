<template>
   <div>
      <div v-if="preloader" class="msgItem preloader"></div>
      <div v-else class="msgItem" :class="{ 'show': preloader, 'active': id }" >
         <div v-show="!preloader" v-for="(msgDay, i) in msg" :key="i">
            <p class="msgItem__date">{{ msgDay[0].date }}</p>
            <div v-for="(msgItem, j) in msgDay" :key="j" class="msgItem__text" :class="{ 'author': msgItem.user }">
               <div class="msgItem__msg">
                  <div class="msgItem__time">{{ msgItem.created }}</div>
                  <p>{{ msgItem.messages }}</p>
               </div>
            </div>
         </div>
      </div>
      <div class="msgAdd">
         <form @submit.prevent="send()" class="send_form">
            <input type="text" name="" placeholder="Написать сообщение" v-model="text"/>
            <button class="btn-send">
               <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMzM0LjUgMzM0LjUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMzNC41IDMzNC41OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiPjxnPjxwYXRoIGQ9Ik0zMzIuNzk3LDEzLjY5OWMtMS40ODktMS4zMDYtMy42MDgtMS42MDktNS40MDQtMC43NzZMMi44OTMsMTYzLjY5NWMtMS43NDcsMC44MTItMi44NzIsMi41NTUtMi44OTMsNC40ODEgIHMxLjA2NywzLjY5MywyLjc5Nyw0LjU0Mmw5MS44MzMsNDUuMDY4YzEuNjg0LDAuODI3LDMuNjkyLDAuNjQsNS4xOTYtMC40ODRsODkuMjg3LTY2LjczNGwtNzAuMDk0LDcyLjEgIGMtMSwxLjAyOS0xLjUxLDIuNDM4LTEuNCwzLjg2OGw2Ljk3OSw5MC44ODljMC4xNTUsMi4wMTQsMS41MDUsMy43MzYsMy40MjQsNC4zNjdjMC41MTMsMC4xNjgsMS4wNCwwLjI1LDEuNTYxLDAuMjUgIGMxLjQyOSwwLDIuODE5LTAuNjEzLDMuNzg2LTEuNzMzbDQ4Ljc0Mi01Ni40ODJsNjAuMjU1LDI4Ljc5YzEuMzA4LDAuNjI1LDIuODIyLDAuNjUxLDQuMTUxLDAuMDczICBjMS4zMjktMC41NzksMi4zNDEtMS43MDUsMi43NzUtMy4wODdMMzM0LjI3LDE4Ljk1NkMzMzQuODY0LDE3LjA2NiwzMzQuMjg1LDE1LjAwNSwzMzIuNzk3LDEzLjY5OXoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiIHN0eWxlPSJmaWxsOiNGRkZGRkYiPjwvcGF0aD48L2c+IDwvc3ZnPg==" /> 
               <span>Отправить</span>
            </button>
         </form>
      </div>
   </div>
</template>

<script>

export default {
   name: 'Message',
   props: [
      'msg',
      'id',
      'time',
      'preloader'
   ],
   data () {
      return {
         img: require('@/assets/810.gif'),
         text: ''
      }
   },
   methods: {
      send() {
         let value = {
            id: this.id,
            text: this.text
         }
         //Обращаемся на api отправляем id чата и сообщение
         this.$store.dispatch('api/sendMsg', value)
         .then(resultSend => {
            console.log(resultSend)
         });
      }
   }
}
</script>
