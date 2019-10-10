<template>
  <div id="app">
    <div class="container">
      <List class="chatList" :chatList="chatList" @setChat="onSetChat" :preloader="showPreloader"/>
      <Message class="msgList" :msg="msg" :preloader="showPreloader2"/>
    </div>
  </div>
</template>

<script>
import List from './components/List'
import Message from './components/Message'



export default {
  name: 'app',
  components: {
    List, Message
  },
  data () {
    return {
      chatList: {},
      msg: {},
      showPreloader: true,
      showPreloader2: true,
    }
  }, 
  methods: {
    fetchData() {
      //Обращаемся на api  и получаем данные о чатах
      this.$store.dispatch('api/getChatList')
        .then(result => {
          this.chatList = result;
          console.log(this.chatList)
          this.showPreloader = false

          //Обращаемся на api отправляем id чата и получаем сообщения
          this.$store.dispatch('api/getMsg', result[0].chat.id_url)
            .then(resultMsg => {
              this.msg = resultMsg;
              console.log(this.msg)
            }).then(() => {
              this.showPreloader2 = false
            }); 
        });
      
    },
    onSetChat (value) {
      console.log(value)
      this.showPreloader2 = true

      this.$store.dispatch('api/getMsg', value)
        .then(resultMsg => {
          this.msg = resultMsg;
          console.log(this.msg)
          this.showPreloader2 = false
        }); 
    }
  },
  created() {
    this.fetchData()
  }
}
</script>