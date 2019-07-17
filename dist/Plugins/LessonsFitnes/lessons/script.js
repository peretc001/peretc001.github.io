// Author: krasovsky
//
//

const dateBtn = document.querySelectorAll('.lesson__row__date__item'); 
const dateShow = document.querySelectorAll('.col-date'); 

dateBtn.forEach(item => {
      const dateBtnLink = item.getAttribute('date-link');
      item.addEventListener('click', (e) => {
            dateShow.forEach(card => {
                  const dateShowLink = card.getAttribute('date-show');
                  if(dateShowLink === dateBtnLink) {
                        card.classList.toggle('active');
                        item.classList.toggle('active');
                  }
            })
      })
});