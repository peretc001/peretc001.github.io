const axios = require('axios');

const uid = 1;

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
export default {
   getChatList,
   getMsg
}