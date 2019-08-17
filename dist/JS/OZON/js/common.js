const checkbox = document.querySelector('.filter-check_checkbox');

//Чекбокс Акция
checkbox.addEventListener('change', function() {
   this.checked ? 
      this.nextElementSibling.classList.add('checked') : 
         this.nextElementSibling.classList.remove('checked');
});

//Корзина
const btnCart     = document.querySelector('#cart'),
      modalCart   = document.querySelector('.cart'),
      btnClose    = document.querySelector('.cart-close');

btnCart.addEventListener('click', () => {
   modalCart.style.display = 'flex';
   modalCart.style.backgroundColor = 'rgba(#000, 80%)';
   document.body.style.overflow = 'hidden';
});
btnClose.addEventListener('click', () => {
   modalCart.style.display = 'none';
   modalCart.style.backgroundColor = 'rgba(#000, 0)';
   document.body.style.overflow = '';
});

//Корзина
const cards       = document.querySelectorAll('.goods .card'),
      cartWrapper = document.querySelector('.cart-wrapper'),
      cartEmpty = document.querySelector('#cart-empty'),
      countGoods = document.querySelector('.counter');

//Добавление в корзину
cards.forEach(card => {
   const btn = card.querySelector('button');
   card.addEventListener('click', () => {
      cartEmpty.remove();
      //Копируем карточку товара в корзину
      const cardClone = card.cloneNode(true);
      cartWrapper.appendChild(cardClone);
      showCount();
   })
});

//Количество товаров в корзине
function showCount() {
   const cartsCount = cartWrapper.querySelectorAll('.card');
   countGoods.textContent = cartsCount.length;
};