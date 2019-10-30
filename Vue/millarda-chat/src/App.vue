<template>
  <div id="app">
    <div class="container">
      <List class="chatList" :chatList="chatList" :countChat="countChat" :currentIdChat="currentIdChat" @setChat="onSetChat" :preloader="showPreloader"/>
      {{ time }}
      <Message class="msgList" :msg="msg" :id="id" :time="time" :preloader="showPreloader2" />
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
      id: '',
      time: '',
      showPreloader: true,
      showPreloader2: true,
      currentIdChat: '',
      countChat: ''
    }
  }, 
  methods: {
    fetchData() {
      //Обращаемся на api  и получаем данные о чатах
      this.$store.dispatch('api/getChatList')
        .then(result => {
          this.chatList = result
          this.countChat = this.chatList.length
          this.currentIdChat = this.chatList[0].chat.id_url
          this.showPreloader = false
          //Обращаемся на api отправляем id чата и получаем сообщения
          this.$store.dispatch('api/getMsg', result[3].chat.id_url)
            .then(resultMsg => {
              this.msg = resultMsg
              // let key1 = Object.keys(this.msg).length - 1
              // let key2 = Object.keys(this.msg[key1]).length - 1

              //Время последнего сообщения
              //console.log(this.msg[key1])
              console.log(this.msg)



              this.id = result[0].chat.id_chat
              this.chat_count = Object.keys(result).length
            }).then(() => {
              this.showPreloader2 = false
            }); 
          //Обращаемся на api отправляем id чата и получаем время сообщения
          // this.$store.dispatch('api/getMsgTime', '11 октября 2019 15:18')
          //   .then(resultMsgTime => {
          //     this.time = resultMsgTime;
          //     this.id = result[0].chat.id_chat
          //     // console.log(resultMsgTime)
          //   }); 
        });
      
    },
    onSetChat (value) {
      this.showPreloader2 = true
      this.$store.dispatch('api/getMsg', value)
        .then(resultMsg => {
          this.msg = resultMsg;
          this.showPreloader2 = false
          this.currentIdChat = value
        }); 
    }
  },
  created() {
    this.fetchData()
  }
}
</script>