<?
$options = get_option( 'lessons_option2' );
?>

<section class="less less-section">
<?php 
function checkTime2($i) {

    if($i == 1) 		{$time = '8:30'; }
    elseif($i == 2) 	{$time = '9:00'; }
    elseif($i == 3) 	{$time = '9:30'; }
    elseif($i == 4) 	{$time = '10:00'; }
    elseif($i == 5) 	{$time = '10:30'; }
    elseif($i == 6) 	{$time = '11:00'; }
    elseif($i == 7) 	{$time = '11:30'; }
    elseif($i == 8) 	{$time = '12:00'; }
    elseif($i == 9) 	{$time = '12:30'; }
    elseif($i == 10) 	{$time = '13:00'; }
    elseif($i == 11) 	{$time = '13:30'; }
    elseif($i == 12) 	{$time = '14:00'; }
    elseif($i == 13) 	{$time = '14:30'; }
    elseif($i == 14) 	{$time = '15:00'; }
    elseif($i == 15) 	{$time = '15:30'; }
    elseif($i == 16) 	{$time = '16:00'; }
    elseif($i == 17) 	{$time = '16:30'; }
    elseif($i == 18) 	{$time = '17:00'; }
    elseif($i == 19) 	{$time = '17:30'; }
    elseif($i == 20) 	{$time = '18:00'; }
    elseif($i == 21) 	{$time = '18:30'; }
    elseif($i == 22) 	{$time = '19:00'; }
    elseif($i == 23) 	{$time = '19:30'; }
    elseif($i == 24) 	{$time = '20:00'; }
    elseif($i == 25) 	{$time = '20:30'; }
    elseif($i == 26) 	{$time = '21:00'; }

    return $time;
    }
    date_default_timezone_set('Europe/Moscow');
?>
    <div class="less__row__date">
		<p class="less__row__date__item<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-link="Mon">ПН</p>
        <p class="less__row__date__item<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-link="Tue">ВТ</p>
        <p class="less__row__date__item<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-link="Wed">СР</p>
        <p class="less__row__date__item<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-link="Thu">ЧТ</p>
        <p class="less__row__date__item<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-link="Fri">ПТ</p>
        <p class="less__row__date__item<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-link="Sat">СБ</p>
        <p class="less__row__date__item<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-link="Sun">ВС</p>
    </div>

    <div class="less__row">

        <div class="col-date<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-show="Mon">
            <div class="less__date">
				<p>Понедельник</p>
            </div>
        
            <?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col1_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col1_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col1_bg'. $i] != "#000000") { echo $options['pn_col1_bg'. $i]; } ?>'>
					<p><?php echo $options['pn_col1_text'. $i]; ?></p>
                </div>
            <?php }  ?>
        </div>

		<div class="col-date<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-show="Tue">
			<div class="less__date">
				<p>Вторник</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col2_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col2_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col2_bg'. $i] != "#000000") { echo $options['pn_col2_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col2_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>

		<div class="col-date<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-show="Wed">
			<div class="less__date">
				<p>Среда</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col3_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col3_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col3_bg'. $i] != "#000000") { echo $options['pn_col3_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col3_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>

		<div class="col-date<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-show="Thu">
			<div class="less__date">
				<p>Четверг</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col4_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col4_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col4_bg'. $i] != "#000000") { echo $options['pn_col4_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col4_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>

		<div class="col-date<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-show="Fri">
			<div class="less__date">
				<p>Пятница</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col5_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col5_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col5_bg'. $i] != "#000000") { echo $options['pn_col5_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col5_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>

		<div class="col-date<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-show="Sat">
			<div class="less__date">
				<p>Суббота</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col6_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col6_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col6_bg'. $i] != "#000000") { echo $options['pn_col6_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col6_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>

		<div class="col-date<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-show="Sun">
			<div class="less__date">
				<p>Воскресенье</p>
			</div>
			
			<?php for ($i = 1; $i <= 26; $i++ ) { ?>
                <div class="less__card<?php if($options['pn_col7_text'. $i] != '') { echo ' js-less-form'; } if($options['pn_col7_text'. $i] == '') { echo ' blank'; } if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime2($i); ?>" style='background: <?php if($options['pn_col7_bg'. $i] != "#000000") { echo $options['pn_col7_bg'. $i]; } ?>'>
                    <p><?php echo $options['pn_col7_text'. $i]; ?></p>
                </div>
            <?php }  ?>
		</div>
	</div>
  </section>