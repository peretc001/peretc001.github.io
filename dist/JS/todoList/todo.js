
let   todoForm = document.querySelector('.create_new_todo'),
      addMessage = document.querySelector('.message'),
      //ul с классом todo
      todo = document.querySelector('.todo');
      console.log(todoForm);

let todoList = [];

function displayMessages() {
   let displayMessage = '';
   //Если в массиве пусто
   if(todoList.length === 0) todo.textContent = '';
   //Если что-то добавляем
   todoList.forEach((item, i)=> {
      displayMessage += `
      <li>
         <input type='checkbox' id='item_${i}' ${item.checked ? 'checked': ''}>
         <label for='item_${i}' class="${item.important ? 'important' : '' }">${item.todo}</label>
      </li>
      `;
      todo.innerHTML = displayMessage;
   })
}

todoForm.addEventListener('submit', (e) => {
   e.preventDefault();
   //Если строка пустая ничего не делаем
   if(!addMessage.value) return;

   
   //Создаем объект
   let newTodo = {
      todo: addMessage.value,
      checked: false,
      important: false
   };

   todoList.push(newTodo);
   displayMessages();
   //Переводим массив JSON в строку и записывыем в локальное хранилице
   //JSON.stringify()
   localStorage.setItem('todo', JSON.stringify(todoList));
   addMessage.value = '';
});



//Следим за изменением чекбокса
todo.addEventListener('change', (e) => {
   let   idInput = e.target.getAttribute('id'),
         forLabel = todo.querySelector('[for=' + idInput + ']'),
         //Получаем текс чекбокса
         valueLabel = forLabel.textContent;

   todoList.forEach(item => {
      //Если совпадают
      if(item.todo === valueLabel) {
         //Меняем значение checked
         item.checked = !item.checked;
         //Записываем в локальное хранилище
         localStorage.setItem('todo', JSON.stringify(todoList));
      }
   })
});

//Отключаем правую кнопку мыши
// todo.addEventListener('contextmenu', (e) => {
//    e.preventDefault();
//    console.log(e.target);
//    let   forLabel = e.target.getAttribute('for');


//          console.log(forLabel);

//    todoList.forEach((item, i) => {
//       if(item.i === forLabel) {
//          //Нажатие Crtl или Cmd
//          if(event.crtlKey || event.metaKey) {
//             //Удаляем элемент из массива с индексом i, удаляем 1 элемент
//             todoList.splice(i, 1);
//          } else {
//             //Меняем значение important
//             item.important = !item.important;
//          }
         
//          displayMessages();
//          localStorage.setItem('todo', JSON.stringify(todoList));
//       }
//    })
// })


//Проверяем локальное хранилище
if(localStorage.getItem('todo')) {
   //Если есть что-то - переводим в массив и запихиваем в переменную
   //JSON.parse()
   
   todoList = JSON.parse(localStorage.getItem('todo'));
   displayMessages();
}
