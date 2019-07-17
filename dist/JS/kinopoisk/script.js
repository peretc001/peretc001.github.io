const searchForm = document.querySelector('#search-form');
const movie = document.querySelector('#movies');
const movieImg = 'https://image.tmdb.org/t/p/w500';
function apiSearch(event) {
   event.preventDefault();
   apiKey = '1e83764beaa265cb36cff807cb56d666';
   
   const searchText = document.querySelector('#searchText').value,
         server = `https://api.themoviedb.org/3/search/multi?api_key=${apiKey}&language=ru&query=${searchText}`;
   movie.innerHTML = "Загрузка";

   fetch(server)
      .then(function(value){
         if(value.status !== 200) {
            return Promise.reject(value);
         }
         console.log(value.status);
         return value.json();
         
      })
      .then(function(output){
         console.log(output);
         let inner = '';
         output.results.forEach(item  => {
            let nameItem = item.name || item.title;
            let poster = item.poster_path;
            inner += `
            <div class="row">
               <div class="col-4">
                  <img src="${movieImg}${poster}" alt="${nameItem}">
               </div>
               <div class="col-8">
                  <h3>${nameItem}</h3>
                  <p>${item.overview}</p>
                  <p>Рейтинг: ${item.popularity}</p>
               </div>
            </div>`;
         });
         movie.innerHTML = inner;
      })
      .catch(function(reason){
         movie.innerHTML = "Опс... что-то пошло не так";
         console.error('error: ' + reason.status);   
      });
      
}
searchForm.addEventListener('submit', apiSearch);