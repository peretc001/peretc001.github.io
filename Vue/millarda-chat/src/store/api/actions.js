const axios = require('axios');

const uid = 19;

let getChatList = () => {
   return axios.get('https://millarda.ru/api/v1/get-chat-room?uid=' + uid, {
     headers: {'Content-Type': 'application/json'}
   })
   .then(function (response) {
     return response.data
   })
}
let getMsg = (context,data) => {
  return axios.get('https://millarda.ru/api/v1/get-chat-msg?uid=' + uid +'&id=' + data, {
    headers: {'Content-Type': 'application/json'}
  })
  .then(function (response) {
    return response.data
  })
}
let sendMsg = (context,data) => {
  return axios.get('https://millarda.ru/api/v1/send-chat-msg?uid=' + uid +'&id=' + data.id + '&message=' + data.text, {
    headers: {'Content-Type': 'application/json'}
  })
  .then(function (response) {
    return response.data
  }).catch(function (error) {
    return error
  })
}
let getMsgTime = (context,data) => {
  return axios.get('https://millarda.ru/api/v1/load-chat-msg?uid=' + uid +'&id=' + data.id + '&time=' + data.time, {
    headers: {'Content-Type': 'application/json'}
  })
  .then(function (response) {
    return response.data
  })
}

export default {
   getChatList,
   getMsg,
   sendMsg,
   getMsgTime
}