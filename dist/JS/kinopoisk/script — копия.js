const searchForm = document.querySelector('#search-form');
const movie = document.querySelector('#movies');

function apiSearch(event) {
   event.preventDefault();
   apiKey = '1e83764beaa265cb36cff807cb56d666';
   
   const searchText = document.querySelector('#searchText').value,
         server = `https://api.themoviedb.org/3/search/multi?api_key=${apiKey}&language=ru&query=${searchText}`;
   movie.innerHTML = "Загрузка";



   requestApi(server)
      .then(function (res) {
         //Парсим json ответ
         const output = JSON.parse(res);
         let inner = '';
         output.results.forEach(item  => {
            let nameItem = item.name || item.title;
            inner += '<div class="col-12">' + nameItem + '</div>';
         });
         movie.innerHTML = inner;
      })
      .catch(function(reason) {
         movie.innerHTML = "Опс... что-то пошло не так";
         console.log('error: ' + reason.status);   
      });
      
}
searchForm.addEventListener('submit', apiSearch);

function requestApi(url) {
   //Создаем ПРОМИС
   return new Promise (function(resolve, reject){
      //Создаем копию класса для работы с сервером
      const request = new XMLHttpRequest();
      //Формируем get запрос по url
      request.open('GET', url);
      //Ожидаем события
      request.addEventListener('load', function(){
         if(request.status !== 200) {
            reject({
               status: request.status
            });
            return;
         }
         resolve(request.response);
      });
      request.addEventListener('error', function(){
         reject({
            status: request.status
         })
      });
      //Отправляем
      request.send();
      return url;
   });

   

   // request.addEventListener('readystatechange', () => {
   //    //Если состояние !=4, пропускаем
   //    if(request.readyState !== 4) {
   //       movie.innerHTML = "Загрузка";
   //       return;
   //    }
   //    //Если ответ !=200 пропускаем и выводим ошибку
   //    if (request.status !== 200) {
   //       movie.innerHTML = "Опс... что-то пошло не так";
   //       console.log('error: ' + request.status);
   //       return;
   //    }
      
   // });
   // 
}