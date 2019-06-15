$(function(){


	var home = localStorage.getItem('home_page');
	var flag = 0;

	$('.clear_input_name').on('click', function(e){	
		$('#company_name').val('')
		$('.clear_input_name').hide();
	});

	$('.clear_input_code').on('click', function(e){	
		$('#company_code').val('')
		$('.clear_input_code').hide();
	});

	$('.clear_input_region').on('click', function(e){	
		$('#company_region').val('')
		$('.clear_input_region').hide();
	});

	$('.clear_input_adres').on('click', function(e){	
		$('#company_adres').val('')
		$('.clear_input_adres').hide();
	});

	$('.clear_input_about').on('click', function(e){	
		$('#company_about').val('')
		$('.clear_input_about').hide();
	});

	$('.clear_input_start_date').on('click', function(e){	
		$('#company_start_date').val('')
		$('.clear_input_start_date').hide();
		flag = 2;
	});

	$('.clear_input_end_date').on('click', function(e){	
		$('#company_end_date').val('')
		$('.clear_input_end_date').hide();
		flag = 2;
	});



	
	$('.edit_company_ajax').on('change','.ecj', function () {
        flag = 2;
        console.log(flag);
    });
    $('.close_page').click(function() {
		if(flag == 2) {
	     	event.preventDefault();
	     	var swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-success mr-2',
			    cancelButton: 'btn btn-secondary'
			  },
			  buttonsStyling: false,
			});
	     	swalWithBootstrapButtons.fire({
			  title: 'Уверены?',
			  text: "Некоторые поля были изменены!",
			  type: 'warning',
			  showCancelButton: true,
			  cancelButtonText: 'Остаться',
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Выйти без сохранения'
			}).then((result) => {
			  if (result.value) {
			  	$('.edit_company_ajax').trigger("reset");
			    window.location.href = home;
			  }
			});
	   	}
	});			
	
	$('.edit_company_ajax').submit(function(e){
		e.preventDefault();
		var m_method=$(this).attr('method');
		var m_action=$(this).attr('action');
		var m_data=$(this).serialize();
		$.ajax({
			type: m_method,
			url: m_action,
			data: m_data,
			success: function(result){
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Обновлено',
				  showConfirmButton: false,
				  timer: 1000
				});
				flag = 0;
			}
		});
	});

	$('.company_page_ajax_form_event').submit(function(e){
		e.preventDefault();
		var m_method=$(this).attr('method');
		var m_action=$(this).attr('action');
		var m_data=$(this).serialize();
		$.ajax({
			type: m_method,
			url: m_action,
			data: m_data,
			success: function(result){
				$('.company_page_event__add').collapse('toggle');
				$('.company_page_ajax_form_event').trigger("reset");
				$(".company_page_event_block").load(location.href+" .company_page_event_block>*","");
			}
		});
	});	

	$('.company_page_ajax_form_contact').submit(function(e){
		e.preventDefault();
		var m_method=$(this).attr('method');
		var m_action=$(this).attr('action');
		var m_data=$(this).serialize();
		$.ajax({
			type: m_method,
			url: m_action,
			data: m_data,
			success: function(result){
				$('.company_page_contact__add').collapse('toggle');
				$('.company_page_ajax_form_contact').trigger("reset");
				$(".company_page_contact_block").load(location.href+" .company_page_contact_block>*","");
			}
		});
	});

	var filter_show = localStorage.getItem('filter_show');
	
	$('#filter').on('hidden.bs.collapse', function () {
	  localStorage.setItem('filter_show', 'hide');
	})
	$('#filter').on('shown.bs.collapse', function () {
	  localStorage.setItem('filter_show', 'show');
	})

	if(filter_show === 'hide') {
		$('#filter').collapse('hide');
	} else {
		$('#filter').collapse('show');
	}


	//Быстрый поиск
	$("#search").keyup(function(){
		_this = this;
		$.each($(".company_items"), function() {
			//$(".user_list .row.today a ul").show();
			if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
			   $(this).hide();
				
			else
			   $(this).show();								   
		});
	});
	
	$('.delete_company').on('click', function(e) {
		e.preventDefault();

     	var company_page = localStorage.getItem('company_page');
     	var swalWithBootstrapButtons = Swal.mixin({
		  customClass: {
		    confirmButton: 'btn btn-success mr-2',
		    cancelButton: 'btn btn-secondary'
		  },
		  buttonsStyling: false,
		});
     	swalWithBootstrapButtons.fire({
		  title: 'Уверены?',
		  text: "Удалить данную компанию",
		  type: 'warning',
		  showCancelButton: true,
		  cancelButtonText: 'Остаться',
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Удалить'
		}).then((result) => {
		  if (result.value) {
		  	$('.edit_company_ajax').trigger("reset");
		    window.location.href = 'inc/action/delete_company.php?id=' + company_page;
		  }
		});
	})


	//Autocomplete Regions
	let autocomplete = (inp, arr) => {
	  let currentFocus;
	  inp.addEventListener("input", function(e) {
	    let a,
	    	b,
	    	i,
	    	val = this.value;

	    closeAllLists();

	    if (!val) {
	      return false;
	    }

	    currentFocus = -1;

	    a = document.createElement("DIV");

	    a.setAttribute("id", this.id + "autocomplete-list");
	    a.setAttribute("class", "autocomplete-items list-group text-left");

	    this.parentNode.appendChild(a);

	    for (i = 0; i < arr.length; i++) {
	      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
	        b = document.createElement("DIV");
	        b.setAttribute("class", "list-group-item list-group-item-action");
	        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
	        b.innerHTML += arr[i].substr(val.length);
	        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
	        b.addEventListener("click", function(e) {
	          inp.value = this.getElementsByTagName("input")[0].value;
	          closeAllLists();
	        });
	        a.appendChild(b);
	      }
	    }
	  });

	  inp.addEventListener("keydown", function(e) {
	    var x = document.getElementById(this.id + "autocomplete-list");
	    if (x) x = x.getElementsByTagName("div");
	    if (e.keyCode == 40) {
	      currentFocus++;
	      addActive(x);
	    } else if (e.keyCode == 38) {
	      currentFocus--;
	      addActive(x);
	    } else if (e.keyCode == 13) {
	      e.preventDefault();
	      if (currentFocus > -1) {
	        if (x) x[currentFocus].click();
	      }
	    }
	  });

	  let addActive = x => {
	    if (!x) return false;
	    removeActive(x);
	    if (currentFocus >= x.length) currentFocus = 0;
	    if (currentFocus < 0) currentFocus = x.length - 1;
	    x[currentFocus].classList.add("active");
	  };

	  let removeActive = x => {
	    for (let i = 0; i < x.length; i++) {
	      x[i].classList.remove("active");
	    }
	  };

	  let closeAllLists = elmnt => {
	    var x = document.getElementsByClassName("autocomplete-items");
	    for (var i = 0; i < x.length; i++) {
	      if (elmnt != x[i] && elmnt != inp) {
	        x[i].parentNode.removeChild(x[i]);
	      }
	    }
	  };

	  document.addEventListener("click", function(e) {
	    closeAllLists(e.target);
	  });
	};

	let countries = ["Адыгея (Республика Адыгея)", "Алтай (Республика Алтай)", "Алтайский край", "Амурская область", "Архангельская область", "Астраханская область", "Башкортостан (Республика Башкортостан)", "Белгородская область", "Брянская область", "Бурятия (Республика Бурятия)", "Владимирская область", "Волгоградская область", "Вологодская область", "Воронежская область", "Дагестан (Республика Дагестан)", "Еврейская автономная область", "Забайкальский край", "Ивановская область", "Ингушетия (Республика Ингушетия)", "Иркутская область", "Кабардино-Балкария (Кабардино-Балкарская Республика)", "Калининградская область", "Калмыкия (Республика Калмыкия)", "Калужская область", "Камчатский край", "Карачаево-Черкесия (Карачаево-Черкесская Республика)", "Карелия (Республика Карелия)", "Кемеровская область", "Кировская область", "Коми (Республика Коми)", "Костромская область", "Краснодарский край (Кубань)", "Красноярский край", "Крым (Республика Крым)", "Курганская область", "Курская область", "Ленинградская область", "Липецкая область", "Магаданская область", "Марий Эл (Республика Марий Эл)", "Мордовия (Республика Мордовия)", "Москва", "Московская область", "Мурманская область", "Ненецкий автономный округ", "Нижегородская область", "Новгородская область", "Новосибирская область", "Омская область", "Оренбургская область", "Орловская область", "Пензенская область", "Пермский край", "Приморский край", "Псковская область", "Ростовская область", "Рязанская область", "Самарская область", "Санкт-Петербург", "Саратовская область", "Саха (Республика Саха (Якутия))", "Сахалинская область", "Свердловская область", "Севастополь", "Северная Осетия (Республика Северная Осетия — Алания)", "Смоленская область", "Ставропольский край", "Тамбовская область", "Татарстан (Республика Татарстан)", "Тверская область", "Томская область", "Тульская область", "Тыва (Республика Тыва)", "Тюменская область", "Удмуртия (Удмуртская Республика)", "Ульяновская область", "Хабаровский край", "Хакасия (Республика Хакасия)", "Ханты-Мансийский автономный округ — Югра", "Челябинская область", "Чечня (Чеченская Республика)", "Чувашия (Чувашская Республика)", "Чукотка (Чукотский автономный округ)", "Ямало-Ненецкий автономный округ", "Ярославская область"];
	autocomplete(document.getElementById("company_region"), countries);				

	$('input[type=file]').change(function(){
	    var t = $(this).val();
	    var labelText = 'File : ' + t.substr(12, t.length);
	    $(this).prev('label').text(labelText);
	  });

});
