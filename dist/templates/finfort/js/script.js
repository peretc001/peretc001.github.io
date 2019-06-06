window.addEventListener("DOMContentLoaded", function() {   
   let errorMsg = document.querySelectorAll('span.error');
   let pas = document.querySelector('#password');
   let btn = document.querySelector('.btn');
   btn.addEventListener('click', () => {
      errorMsg.forEach(item => {
         item.classList.remove('d-none');
      });
      pas.classList.add('error');
   });
});
