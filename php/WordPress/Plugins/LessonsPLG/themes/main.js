

//Lessons
document.addEventListener("DOMContentLoaded", function() {
	if (document.body.clientWidth < 767) {
		const less = document.querySelectorAll('.less-section')
		less.forEach(elem => {
			const dayList = elem.querySelectorAll('.less__row__date__item')
			dayList.forEach((item,i) => {
				item.addEventListener('click', (e) => {
					item.closest('div').querySelector('.active').classList.remove('active')
					item.closest('div').nextElementSibling.querySelector('.active').classList.remove('active')
					item.classList.add('active')
					// console.log(item.closest('div').nextElementSibling.children[i])
					item.closest('div').nextElementSibling.children[i].classList.add('active')
					
				})
			})
		})
	}
})
