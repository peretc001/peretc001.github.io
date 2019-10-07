<template>
  <div id="app">
    <List :uid="uid"/>
    <Message />
  </div>
</template>

<script>
import List from './components/List'
import Message from './components/Message'

const axios = require('axios');

export default {
  name: 'app',
  components: {
    List, Message
  },
  data () {
    return {
      uid: 1,
      
    }
  },
  beforeMount () {
    axios.get('https://millarda.ru/api/v1/get-chat-room?uid=1', {
      headers: {'Content-Type': 'application/json'}
    })
    .then(function (response) {
      console.log(response.data)
      this.uid = response.data
    })
    .catch(function (error) {
      console.log(error);
    }); 
  },
  methods: {

  }
}
</script>