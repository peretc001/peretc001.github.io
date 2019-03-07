<footer>
		<div class="row top">
			<h4>Ждём вас:<br>
			<span>Ежедневно: с 13:00 до 23:00</span></h3>
		</div>				
		<div class="row">
			<div class="one-third column logo">
				<p><a class="logo" href="/"><img src="/images/logo-footer.svg"></a></p>
				<ul>
					<li class="social">
						<a target="_blank" href="https://vk.com/sbani_krd" rel="noopener"><img src="/images/social/1b.svg"/></a>
						<a target="_blank" href="https://www.facebook.com/BaniSuvorovskie/" rel="noopener"><img src="/images/social/2b.svg" /></a>
						<a target="_blank" href="https://instagram.com/sbani_krd/" rel="noopener"><img src="/images/social/3b.svg"/></a>
					</li>
				</ul>
			</div>
			<?php
				$id = 1298; // id страницы
				$post = get_page($id);
				$content = $post->post_content;
				echo $post->post_content;
			?>
		</div>
		<div id="footer_m"></div>

		
		<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		<script type="text/javascript">
			ymaps.ready(init);
			
			function init() {
					myMapFooter = new ymaps.Map('footer_m', {
						center:[45.0612,38.9493],
						zoom: 16
					});
					 s = {
						iconLayout: 'default#image',
						iconImageHref: '/images/logo-map.svg',
						iconImageSize: [87, 74], 
						iconImageOffset: [-43, -56]
					};
					m = {
						m1: new ymaps.Placemark([45.0626,38.9487], {}, s),
						m1center:[45.0612,38.9493],
						m2: new ymaps.Placemark([45.4508,39.4477], {},s),
						m2center:  [45.4508,39.4477]
					};
					myMapFooter.behaviors.disable('scrollZoom');
					//на мобильных устройствах... (проверяем по userAgent браузера)
					if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
						//... отключаем перетаскивание карты
						myMapFooter.behaviors.disable('drag');
					}
					myMapFooter.geoObjects
						.add(m['m1'])
						.add(m['m2']);
				};
				
				$(function(){
					js_map = $('.js_map');

					map_info = $('.map-info');
					js_map.click(function(){
						var elm = $(this);
						map_info.removeClass('show');
						$('#'+elm.data('map')).addClass('show');
						js_map.parent().removeClass('active');
						elm.parent().addClass('active');
						myMapFooter.geoObjects.add(m[elm.data('map')]);
						myMapFooter.setCenter(m[elm.data('map')+'center']);
					});
				})
		</script>
</footer>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter30348992 = new Ya.Metrika({id:30348992,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/30348992" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>