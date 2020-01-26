document.addEventListener("DOMContentLoaded", function() {
    if ( document.querySelector('.nav') ) {
        var nav = document.querySelector('.nav');
        var navBtn = document.querySelector('.navbar-toggler');
        navOpen = false;
        navBtn.addEventListener('click', function(e) {
            function disableScrolling(){
                var x=window.scrollX;
                var y=window.scrollY;
                window.onscroll=function(){window.scrollTo(x, y);};
            }

            function enableScrolling(){
                window.onscroll=function(){};
            }
            var catalog = document.querySelector('.nav-catalog');
            if(navOpen === false) {
                catalog.classList.add('in');
                navBtn.classList.add('is-active');
                setTimeout(() => {
                    catalog.classList.remove('in');
                    catalog.classList.add('active');
                }, 300);
                disableScrolling();
                navOpen = true;
            } else {
                catalog.classList.add('out');
                navBtn.classList.remove('is-active');
                setTimeout(() => {
                    catalog.classList.remove('out');
                    catalog.classList.remove('active');
                }, 300);
                enableScrolling();
                navOpen = false;
            }
        });
    }

    const form = document.querySelectorAll('.callback__form');
    form.forEach(item => {
        const formBtn = item.querySelector('.callback__form__button');
        const checkBtn = item.querySelector('.robot__check');

        formBtn.disabled = true;
        checkBtn.addEventListener('click', () => {
            checkBtn.classList.add('active');
        
            item.action = '/thankyou.php';
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "human");
            input.setAttribute("value", "human");
            input.classList.add('human');
            item.appendChild(input);
            formBtn.disabled = false;
        })
    })


    //Скидка 10% с раздела Рекомендации по настрйке парты и стула
    if ( document.querySelector('.modal2') ) {
        let modal2 = document.querySelector('.modal2');
        let closeBtn2 = document.querySelector('.close_modal2');
        let modalBtn2 = document.querySelector('.myModal2');

        function openModal2() {
            modal2.classList.add('show');
        };
        function closeModal2() {
            modal2.classList.remove('show');
        };
        modalBtn2.addEventListener('click', (e) => {
            e.preventDefault();
            openModal2();
        })
        modal2.addEventListener('click', function(e) {
            if(e.target.classList.contains('modal2') || e.target === closeBtn2) {
                closeModal2();
            }
        });
        document.addEventListener('keydown', function(evt) {
            if (evt.keyCode === 27) {
                closeModal2();
            }
        });
    }

    if (document.querySelector('.notes_top_products')) {
        let topProducts = document.querySelector('.notes_top_products');
        console.log(topProducts);
        topProducts.innerHTML = `
                <div class="top_products">
            <div class="introHolder">
                <h3>Самые популярные товары</h3>
            </div>
            <div class="flex">
                <div class="col-x4">
                <a class="top_products__href has-overlay" href="/shop/parta_bez_risunka/cyt41/parta_cyt41_so_stulom_cyt01-01.php?color=dub_grey" style="background-image: url('/img/home/6.jpg')" onclick="ym(15357751, 'reachGoal', 'CLICK_NOTES_TOP'); return true;">
                        <div class="top_products__text">Парта ДЭМИ СУТ.41</div>
                        <span class="more-link"><i class="fa fa-angle-right flipInY" aria-hidden="true"></i> Подробнее</span>
                    </a>
                </div>
                <div class="col-x4">
                    <a class="top_products__href has-overlay" href="/shop/white/cyt24/bez_stula/parta_cyt24.php?color=white_blue" style="background-image: url('/img/home/2.jpg')" onclick="ym(15357751, 'reachGoal', 'CLICK_NOTES_TOP'); return true;">
                        <div class="top_products__text">Парта ДЭМИ СУТ.24</div>
                        <span class="more-link"><i class="fa fa-angle-right flipInY" aria-hidden="true"></i> Подробнее</span>
                    </a>
                </div>
                <div class="col-x4">
                    <a class="top_products__href has-overlay" href="/shop/parta_bez_risunka/cyt17/bez_stula/parta_cyt17-04-d1.php?color=grey" style="background-image: url('/img/home/4.jpg')" onclick="ym(15357751, 'reachGoal', 'CLICK_NOTES_TOP'); return true;">
                        <div class="top_products__text">Парта ДЭМИ СУТ.17-04</div>
                        <span class="more-link"><i class="fa fa-angle-right flipInY" aria-hidden="true"></i> Подробнее</span>
                    </a>
                </div>
                <div class="col-x4">
                    <a class="top_products__href has-overlay" href="/shop/white/cyt25/bez_stula/parta_cyt25-03.php?color=white_blue" style="background-image: url('/img/home/5.jpg')" onclick="ym(15357751, 'reachGoal', 'CLICK_NOTES_TOP'); return true;">
                        <div class="top_products__text">Парта ДЭМИ СУТ.25-03</div>
                        <span class="more-link"><i class="fa fa-angle-right flipInY" aria-hidden="true"></i> Подробнее</span>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="twelve columns box desk">
                    <ul>
                        <li><img src="/img/desk.svg" alt="Акиця"></li>
                        <li>скидка на стул «ДЭМИ»<br><small>при покупке с партой</small></li>
                        <li><span class="sale">-25%</span></li>
                    </ul>
                </div>
            </div>
        </div>
        `;
    }

    if (document.querySelector('.spec_show_more')) {
        const specShowBtn = document.querySelector('.spec_show_more')
        const specRow = document.querySelector('.specification .row')

        if ( window.screen.availWidth - (window.screen.availWidth - window.innerWidth) < 576 ) {
            specRow.classList.add('hidden')
        }

        specShowBtn.addEventListener('click', () => {
            if ( specRow.classList.contains('hidden') ) {
                specRow.classList.remove('hidden')
                specShowBtn.classList.add('active')
            } else {
                specRow.classList.add('hidden')
                specShowBtn.classList.remove('active')
            }

        })
    }
    
});


$( document ).ready(function() {

    $('#add').submit(function(e){
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
                  icon: 'success',
                  title: 'Товар добавлен',
                  showConfirmButton: false,
                  timer: 1500
                });
                $('.nav-menu__cart').hide();
                $('span.cartajax').show();
                $('span.cartajax').html(result).addClass('animated');
                setTimeout(function(){
                    $('span.cartajax').html(result).removeClass('animated');
                }, 500)
                $("html, body").animate({ scrollTop: 0 }, 600);
            }
        });
    });

    //Hide - show description
	$('.show_description').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
        $('.hide_description').toggleClass('opener');
    });
    

    $(document).on("click",'.product_box .pack a',function(){

        $('.product_box .product_img').html('<div align="center" style="margin:0 auto; display:block; width:300px; height:300px; background-image:url(/img/load.gif); background-position:center center; background-repeat:no-repeat; background-color:#ffffff;">&nbsp;</div>');
        
        var ww=$.ajax({
            type:"GET",
            cache:false,
            url:$(this).attr('href'),
            global:false,
            dataType:"text",
            success:function(data){
                //Цвет
                $('.product_box .color ul').html($(data).find('.product_box .color ul').html());
                //Спецификация
                $('div[id=specification] .row').html($(data).find('div[id=specification] .row').html());
                    
                
                setTimeout(function(){
                    
                    //Комплектация со Стулом или без
                    $('.product_box .option').html($(data).find('.product_box .option').html());
                    //Картинка со стулом или без
                    $('.product_box .product_img').html($(data).find('.product_box .product_img').html());

                    
                    
                    $('h1[itemprop=name]').html($(data).find('h1[itemprop=name]').html());
                    $('.product_buy p.bf').html($(data).find('.product_buy p.bf').html());
                    $('.product_buy p.old').html($(data).find('.product_buy p.old').html());
                    $('.product_buy p.price').html($(data).find('.product_buy p.price').html());
                    $('.product_buy .delivery p .cred_it').html($(data).find('.product_buy .delivery p .cred_it').html());
                    $('.product_buy .oplata p span').html($(data).find('.product_buy .oplata p span').html());
                    $('form[id=add]').html($(data).find('form[id=add]').html());

                },600);
            },
            });
        if(ww){return false;}
        else{return true;}
    });


    $(".file-upload input[type=file]").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $("#filename").val(filename);
        $(".file-upload span").hide();
    });

    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
           $('.whatsapp__bottom').fadeIn();
       } else {
           $('.whatsapp__bottom').fadeOut();
       }
   });

   if ( document.querySelector('.email_input') ) {
        $('.email_input').on('change', function(e) {
            let data = $('.shopping_cart').serialize();
            $.ajax({
                method: "POST",
                url: "/shop/inc/abandonedcart.php",
                data: data
            }).done(function(response) {              

            }).fail(function(xhr, ajaxOptions, thrownError){
                console.log(thrownError);
            });
        });
    }

    $(".phone_mask").mask("8-999-999-99-99");

    $('.lazy').Lazy();
});