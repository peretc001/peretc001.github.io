(function(j, l, n) {
    
    var auto;
    var clocktimer = "";
    var closeView = true;
    var formOpen = true;
    q = setInterval(function() {
        if(document.readyState == "complete"){
            var mo = isMobile();
            if (!mo) {
                clearInterval(q);
                var url = location.href;
                var refer = document.referrer;
                var a = l.createElement("link");
                a.setAttribute("rel", "stylesheet");
                a.setAttribute("type", "text/css");
                a.setAttribute("href", 'http://perezvoni.com/perezvoni.com/vendor/perzvoniWidget/css/perezvoniWidget.css?rnd='+getRandomInt(1000, 9999));
                l.getElementsByTagName("head")[0].appendChild(a);
                                auto = setTimeout(function(){
                    initForm();
                }, 1000);
                                                var b = document.createElement("div");
                b.setAttribute("class", "perezvoniWidget_button perezvoniWidget_show_popup perezvoniWidget_button_right perezvoniWidget_open_popup");
                document.getElementsByTagName("body")[0].appendChild(b);
                                var form_button = document.getElementsByClassName('perezvoniWidget_open_popup');
                for(var i = 0; i < form_button.length; i++){
                    form_button[i].onclick = function(){
                        initForm();
                        clearTimeout(auto);
                    }
                }
            }
        }
    }, 11);    
    
    function initForm(){
        formOpen = false;
        var a = '';
                
        a += '<div class="perezvoniWidget_popup-underlay" style="display:block;"></div>';
        a += '<div class="perezvoniWidget_popup-wrapper" style="display:block;left: 50%;top: 50%;margin: -165px 0 0 -490.5px;">';
        a += '	<div class="perezvoniWidget_popup">';
        a += '		<div id="perezvoniWidget_close" class="perezvoniWidget_popup-close"></div>';
        a += '		<div class="perezvoniWidget_image">';
                a += '			<img src="http://perezvoni.com/perezvoni.com/vendor/perzvoniWidget/images/perezvoniWidget_image_1.png">';
                a += '			<div class="perezvoniWidget_description">';
        a += '				Коркишко Кирилл, консультант';
        a += '			</div>';
        a += '		</div>';
        a += '		<div class="perezvoniWidget_context">';
        a += '			<div class="perezvoniWidget_title">';
        a += '				<b>Хотите вам перезвонит за 25 секунд</b><br />';
        a += '				наш консультант и расскажет про парты трансформеры ДЭМИ?
Для вас звонок бесплатный.';
        a += '			</div>';
        a += '			<div class="perezvoniWidget_arrow"></div>';
        a += '			<div class="perezvoniWidget_form">';
        a += '				<input type="text" class="perezvoniWidget_input transition" id="perezvoniWidget_input_phone" placeholder="+7..." value="+7" />';
        a += '				<input id="perezvoniWidget_call" type="submit" class="perezvoniWidget_submit" value="Звоните!" />';
        a += '			</div>';
        a += '			<div class="perezvoniWidget_timer">';
        a += '				<div class="perezvoniWidget_timer-caption">';
        a += '					Обещаем перезвонить через:';
        a += '				</div>';
        a += '				<div class="perezvoniWidget_time">';
        a += '					<span id="perezvoniWidget_b_text" >00:25.00</span> сек.';
        a += '				</div>';
        a += '			</div>';
        a += '		</div>';
        a += '		<div class="perezvoniWidget_footer">';
        a += '			<a href="http://perezvoni.com/" target="_blank">Виджет Perezvoni.com</a>';
        a += '		</div>';
        a += '	</div>';
        a += '</div>';
                var b = l.createElement('div');
        b.setAttribute("id", "perezvoniWidget_wrapper");
        b.setAttribute("style", "opacity:0;");
        b.innerHTML = a;
        l.body.appendChild(b);
        
        var work_div = document.getElementById('perezvoniWidget_wrapper');
        fadeIn(work_div);
        
        var close_btn = document.getElementById('perezvoniWidget_close');
        close_btn.onclick = function(){
            var work_div = document.getElementById('perezvoniWidget_wrapper');
           	(new Image).src = "http://perezvoni.com/modules/closeForm/1748-63-a1963-b3fa1963-cad2b-a92bb7bb3fa1963-0aaa92bb7b.png";
            fadeOut(work_div);
            setTimeout(function(){
                var parentElement = work_div.parentNode;
                parentElement.removeChild(work_div);
                if(clocktimer != ""){
                    clearInterval(clocktimer);
                }
            }, 510);
            formOpen = true;
            return false;
        }
        
        document.getElementById('perezvoniWidget_input_phone').oninput = function(){
            if(document.getElementById('perezvoniWidget_input_phone').value.length <= 1){
                document.getElementById('perezvoniWidget_input_phone').value = "+7";
            }
            var val = document.getElementById('perezvoniWidget_input_phone').value;
            if(isNaN(val)){
                document.getElementById('perezvoniWidget_input_phone').value = "";
            }else{
                document.getElementById('perezvoniWidget_input_phone').value = val;
            }
            if(document.getElementById('perezvoniWidget_input_phone').value.length >= 18){
                document.getElementById('perezvoniWidget_call').focus();
            }
        };
        
        var call_btn = document.getElementById('perezvoniWidget_call');
        call_btn.onclick = function(){
            
            var input = document.getElementById('perezvoniWidget_input_phone').value;
            if(input == "" || input == "+7"){
                alert('Введите номер телефона');
                return false;
            }
            var phone = input;
            (new Image).src = "http://perezvoni.com/modules/call/1748-63-a1963-b3fa1963-cad2b-a92bb7bb3fa1963-0aaa92bb7b.png?number="+phone;
            document.getElementById('perezvoniWidget_call').value = 'ок';
            document.getElementById('perezvoniWidget_call').setAttribute("id", "perezvoniWidget_close0");
            var close_btn0 = document.getElementById('perezvoniWidget_close0');
            close_btn0.onclick = function(){
                var work_div = document.getElementById('perezvoniWidget_wrapper');
               	(new Image).src = "http://perezvoni.com/modules/closeForm/1748-63-a1963-b3fa1963-cad2b-a92bb7bb3fa1963-0aaa92bb7b.png";
                fadeOut(work_div);
                setTimeout(function(){
                    var parentElement = work_div.parentNode;
                    parentElement.removeChild(work_div);
                    if(clocktimer != ""){
                        clearInterval(clocktimer);
                    }
                }, 510);
                return false;
            }
            function startTIMER(sec) { 
                var ms = 99; 
                var ds = sec;
                clocktimer = setInterval(function(){
                    ms--;
                    if(ms < 10){ms = '0'+ms;}
                    if(ms < 1){ 
                      ms = 99;
                      ds --;
                      if(ds < 10){ ds = '0'+ds; }
                      if(ds < 1){
                       ds = 59;
                       dm ++;
                       if(dm<10){ dm = '0'+dm; }
                      }
                    }
                    readout = '00:' + ds + '.' + ms; 
                    document.getElementById('perezvoniWidget_b_text').innerHTML = readout;
                },10); 
            }
            startTIMER(25);
            setTimeout(function(){
                if(clocktimer != ""){
                    clearInterval(clocktimer);
                }    
                var work_div = document.getElementById('perezvoniWidget_wrapper');
               	fadeOut(work_div);
                setTimeout(function(){
                    var parentElement = work_div.parentNode;
                    parentElement.removeChild(work_div);
                }, 510);
            }, 25000)
        }
    }
    
        
    function fadeIn(el) {
      el.style.opacity = 0;
    
      var last = +new Date();
      var tick = function() {
        el.style.opacity = +el.style.opacity + (new Date() - last) / 500;
        last = +new Date();
    
        if (+el.style.opacity < 1) {
          (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16)
        }
      };
    
      tick();
    }
    
    function fadeOut(el) {
      el.style.opacity = 1;
    
      var last = +new Date();
      var tick = function() {
        el.style.opacity = +el.style.opacity - (new Date() - last) / 500;
        last = +new Date();
    
        if (+el.style.opacity > 0) {
          (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16)
        }
      };
    
      tick();
    }
    
    function getRandomInt(a, b) {
        return Math.floor(Math.random() * (b - a + 1)) + a
    }

    function isMobile() {
        return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|ipad|playbook|silk/i.test(navigator.userAgent || navigator.vendor || window.opera) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent || navigator.vendor || window.opera).substr(0, 4)))
    }
    
})(this, this.document);