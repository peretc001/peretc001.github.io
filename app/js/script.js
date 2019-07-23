$('.show_description').click(function(e){
      e.preventDefault();
      $(this).toggleClass('active');
      $('.hide_description').toggleClass('opener');
      if (!$(this).data('status')) {
      } else {
      }
});

$('.hover-column').on('touchstart', function(e){
      $(".name").trigger("mouseover");
});

let form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        let formBtn = item.querySelector('.callback__form__button');
        let checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = '/thankyou.php';
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "human");
            input.setAttribute("value", "human");
            input.classList.add('human');
            //if(input.classList.contains('human')) {} else {
                item.appendChild(input);
            //}
            formBtn.disabled = false;
        });
    });

    //Phone mask
    [].forEach.call( document.querySelectorAll('.tel'), function(input) {
        var keyCode;
        function mask(event) {
            event.keyCode && (keyCode = event.keyCode);
            var pos = this.selectionStart;
            if (pos < 3) event.preventDefault();
            var matrix = "+7 (___) ___ ____",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, ""),
                new_value = matrix.replace(/[_\d]/g, function(a) {
                    return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
                });
            i = new_value.indexOf("_");
            if (i != -1) {
                i < 5 && (i = 3);
                new_value = new_value.slice(0, i);
            }
            var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                function(a) {
                    return "\\d{1," + a.length + "}"
                }).replace(/[+()]/g, "\\$&");
            reg = new RegExp("^" + reg + "$");
            if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
            if (event.type == "blur" && this.value.length < 5)  this.value = "";
        }
    
        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
        input.addEventListener("keydown", mask, false);
    });