//Modal Callback
let modal = document.querySelector('.modal');
let closeBtn = document.querySelector('.close_modal');
let modalBtn = document.querySelector('.myModal');

function openModal() {
	modal.classList.add('show');
};
function closeModal() {
	modal.classList.remove('show');
};
modalBtn.addEventListener('click', (e) => {
	e.preventDefault();
	openModal();
})
modal.addEventListener('click', (e) => {
	if(e.target.classList.contains('modal') || e.target === closeBtn) {
		closeModal();
	}
});
document.addEventListener('keydown', function(evt) {
	if (evt.keyCode === 27) {
		closeModal();
	}
});

let form = document.querySelector('.callback__form');
let formBtn = document.querySelector('.callback__form__button');
let checkBtn = document.querySelector('.circle-loader');
let complete = document.querySelector('.checkmark');

formBtn.disabled = true;
checkBtn.addEventListener('click', () => {
	checkBtn.classList.add('load-complete');
	checkBtn.style.cursor = 'auto';
	complete.style.display = 'block';
  
	form.action = '/thankyou.php';
	var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "human");
    input.setAttribute("value", "human");
	checkBtn.appendChild(input);
	formBtn.disabled = false;
});

//If good
let callback = localStorage.getItem('callback');
if (callback === '1') {
	document.querySelector("li.button-jittery").classList.remove('button-jittery');
}
