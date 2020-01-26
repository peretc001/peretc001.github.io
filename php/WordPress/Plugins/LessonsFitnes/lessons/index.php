<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.min.css">
  <?php wp_head(); ?>
</head>
<body>
  
</body>
</html>

  <section class="lesson" id="rasp">
    <div class="container">
      <h2 class="h2__title inverse">
        Расписание
      </h2>

      <?php function checkTime($i) {

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
      $options = get_option( 'lessons_option' );
      date_default_timezone_set('Europe/Moscow');

      $today = date('w');
      //Пн
      $mon  = mktime(0, 0, 0, date("m")  , date("d")-$today+1, date("Y"));      
      ?>

      <div class="lesson__row__date">
        <p class="lesson__row__date__item<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-link="Mon">Пн, <?php echo date('d.m', $mon); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-link="Tue">Вт, <?php echo date('d.m', strtotime('+1 day', $mon)); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-link="Wed">Ср, <?php echo date('d.m', strtotime('+2 day', $mon)); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-link="Thu">Чт, <?php echo date('d.m', strtotime('+3 day', $mon)); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-link="Fri">Пт, <?php echo date('d.m', strtotime('+4 day', $mon)); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-link="Sat">Сб, <?php echo date('d.m', strtotime('+5 day', $mon)); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-link="Sun">Вс, <?php echo date('d.m', strtotime('+6 day', $mon)); ?></p>
      </div>

      <div class="lesson__row">

        <div class="col-date<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-show="Mon">
         	<div class="lesson__date">
            <p>Пн, <?php echo date('d.m', $mon); ?></p>
          </div>  
      <?php 
			 	for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col1_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col1_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col1_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col1_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-show="Tue">
        <div class="lesson__date">
          <p>Вт, <?php echo date('d.m', strtotime('+1 day', $mon)) ?></p>
        </div>
      <?php 
				for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col2_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col2_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col2_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col2_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-show="Wed">
        <div class="lesson__date">
          <p>Ср, <?php echo date('d.m', strtotime('+2 days', $mon)) ?></p>
        </div>
      <?php 
				for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col3_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col3_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col3_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col3_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-show="Thu">
        <div class="lesson__date">
          <p>Чт, <?php echo date('d.m', strtotime('+3 days', $mon)) ?></p>
        </div>
      <?php 
				for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col4_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col4_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col4_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col4_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-show="Fri">
        <div class="lesson__date">
          <p>Пт, <?php echo date('d.m', strtotime('+4 days', $mon)) ?></p>
        </div>
      <?php 
				for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col5_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col5_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col5_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col5_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-show="Sat">
        <div class="lesson__date">
          <p>Сб, <?php echo date('d.m', strtotime('+5 days', $mon)) ?></p>
        </div>
      <?php 
			  for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col6_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col6_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col6_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col6_text'. $i]; ?></p></div>
      <?php }  ?></div>

      <div class="col-date<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-show="Sun">
        <div class="lesson__date">
          <p>Вс, <?php echo date('d.m', strtotime('+6 days', $mon)) ?></p>
        </div>
      <?php 
				for ($i = 1; $i <= 26; $i++ ) { 
          if($options['pn_col'. $i .'_hidden'] == true) { continue; }
      ?>
      <div class="lesson__card<?php if($options['pn_col7_text'. $i] == '') { echo ' disabled'; } ?>" data-time="<?php echo checkTime($i); ?>" <?php if($options['pn_col7_bg'. $i] != "#000000") { echo 'style="background:'. $options['pn_col7_bg'. $i] .'"'; } ?>><p><?php echo $options['pn_col7_text'. $i]; ?></p></div>
      <?php }  ?></div>

      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4"><?php echo $options['bottom_text1']; ?></div>
        <div class="col-md-6 col-lg-4"><?php echo $options['bottom_text2']; ?></div>
        <div class="col-md-12 col-lg-4"><?php echo $options['bottom_text3']; ?></div>
      </div>

    </div>
  </section>
<?php wp_footer(); ?>
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>