function openMailModal (delay, maxAge, overEvent) {
		var startTime = Date.now()
		var blockClosing = $(".modal-mail .modal-mail-bg, .modal-mail .block-closing")
		var modal =  $(".modal-mail")
		var leaved = false
		var isReadyToScroll = true

		$(window).mouseout(function (e) {
			if (e.relatedTarget == null) {			
				leaved = true
				var endTime = Number(((Date.now() - startTime) / 1000).toFixed())
				var localStorageValue = localStorage.getItem("modalMaxAge")

				function checkingValueLocalStorage (objectValues) {
					if (objectValues) {
						var currentDate = new Date()
						var currentYear = currentDate.getFullYear()
						var currentMonth = currentDate.getMonth()	
						var currentDay = currentDate.getDate()

						var year = objectValues.year
						var month = objectValues.month
						var day = objectValues.day

						if (currentYear > year || 
								(currentYear == year && currentMonth > month) || 
								(currentYear == year && currentMonth == month && currentDay - day > maxAge)
							) {
							return true
						} else return false
					}
					else return true
				}

				if (!isReadyToScroll && e.pageY - $(window).scrollTop() <= 1) {	
					if (endTime >= delay && checkingValueLocalStorage(localStorageValue ? 
						JSON.parse(localStorageValue) : "")
					) {
						modal.fadeIn(300)
					}
				}
			}
		}).mousemove(function () {
			isReadyToScroll = false
		})
			
		$(window).mouseover(function (e) {
			if (e.relatedTarget == null) {
				isReadyToScroll = true
				if (leaved && overEvent) startTime = Date.now()
			}
		})

		blockClosing.click(function () {
			var date = new Date()
			localStorage.setItem("modalMaxAge", JSON.stringify({
				year: date.getFullYear(),
				month: date.getMonth(),
				day: date.getDate()
			}))
			modal.fadeOut(300)
		})
	} 

	// Call your function
	openMailModal(20, 7)