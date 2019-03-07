<?php wp_footer(); ?>

<script>
$(function() {
	if(!$.cookie('city_selector_clicked')) {
        $(window).load(function() {
           $('.header .phones .balloon').addClass('animate').addClass('visible');
        });
    }
    $('.balloon .marker').on('click', function() {
        $(this).parent().removeClass('animate').toggleClass('visible');
        $.cookie('city_selector_clicked', true, {expires: 1, path: '/'});
        return false;
    });
    
    if(!$.cookie('city'))
    {
        navigator.geolocation.getCurrentPosition(function(position) {
            if(
                position.coords.latitude > 45.406915  && 
                position.coords.latitude < 45.512510  &&
                position.coords.longitude > 39.373010 && 
                position.coords.longitude < 39.531965
            ) {
                change_city(2);
            }
        });
    }
});

function change_city(id)
{
    $.cookie('city_selector_clicked', true, {expires: 1, path: '/'});
    $.cookie('city', id, {expires: 1, path: '/'});
    window.location.assign(window.location.href.split('#')[0]);
};
</script>

<!-- code>
    clicking on ".mobile-button-menu" toggles class ".mobile-button-menu__active" on ".mobile-button-menu"
    clicking on ".mobile-button-menu" toggles class ".mobile-menu-list-block__show" on ".mobile-menu-list-block"
    clicking on ".mobile-button-menu" removes class ".mobile-phones-info-list__show" on ".mobile-phones-info-list"
    clicking on ".mobile-button-menu" removes class ".mobile-social-info-list__show" on ".mobile-social-info-list"

    clicking on ".mobile-button-phones" toggles class ".mobile-phones-info-list__show" on ".mobile-phones-info-list"
    clicking on ".mobile-button-phones" toggles class ".mobile-social-info-list__show" on ".mobile-social-info-list"
    clicking on ".mobile-button-phones" removes class ".mobile-menu-list-block__show" on ".mobile-menu-list-block"
    clicking on ".mobile-button-phones" removes class ".mobile-button-menu__active" on ".mobile-button-menu"
</code -->

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
<?php echo '<!--', (microtime(true) - START_TIME), '-->'; ?>
