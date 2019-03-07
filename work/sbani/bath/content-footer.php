<?php
global $header_contacts, $footer_contacts, $CONTENT_PAGES;
?>
<footer id="contacts" class="second">
    <div class="wrapper-small">
        <div class="left">
            <ul class="select-city">
                <li>	
                    <p class="title"><?=$footer_contacts[0][0]?></p>
                    <p><?=$footer_contacts[0][1]?></p>
                    <p><?=implode('<br/>', array_slice($footer_contacts[0], 2))?></p>
                <!--li-end-->
                <li>	
                    <p class="title"><?=$footer_contacts[1][0]?></p>
                    <p><?=$footer_contacts[1][1]?></p>
                    <p><?=implode('<br/>', array_slice($footer_contacts[1], 2))?></p>
                <!--li-end-->
            </ul><!--.select-city-end-->
        </div><!--.left-end-->
        <div class="right">
            <div class="social">
                <img src="/images/logo-footer.png" alt="Суворовские бани">
                <p>в соцсетях</p>
                <?php
                $page = get_page($CONTENT_PAGES['soc_icons']);
                ?>
                <div><?=$page->post_content?></div>
            </div><!--.social-end-->
        </div><!--.right-end-->
    </div><!--.wrapper-small-end-->
</footer>