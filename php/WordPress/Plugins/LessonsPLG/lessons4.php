<?// Hook for adding admin menus
add_action('admin_menu', 'lessons_admin_page4');

// action function for above hook
function lessons_admin_page4() {
    add_menu_page('Расписание занятий4', 'Расписание занятий4', 10, __FILE__, 'lessons_page4', 'dashicons-calendar-alt', 49.6);
    register_setting( 'lessonsCustom4', 'lessons_option4' ); 
}
function lessons_page4() { 
	$options = get_option( 'lessons_option4' );
	$url = plugin_dir_url( __FILE__ );
?>
	<link rel='stylesheet' href='<?php echo $url .'custom.min.css'; ?>' type='text/css' media='all' />
	<style>
	#wpbody {margin-left: -20px !important;}
	.lesson {padding: 40px; padding-right: 100px}
	.lesson .textarea { display: block; margin: 0 0 10px 0; width: 100%; min-height: 50px; padding: 10px; border: 1px dashed #fff; color: #fff; background: transparent; font-size: 1em;}
	.lesson .textarea:focus { background: #fff; color: #383838; }
	.lesson input, .lesson textarea { outline: none !important; box-shadow: none !important; }
	</style>
   <form action='options.php' method='post'>

	<section class="lesson">
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
		
		date_default_timezone_set('Europe/Moscow');

      $today = date('w');
      //Пн
      $mon  = mktime(0, 0, 0, date("m")  , date("d")-$today+1, date("Y"));      
      ?>
		<div class="lesson__row__date">
        <p class="lesson__row__date__item<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-link="Mon">Пн, <?php echo date('d.m', $mon); ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-link="Tue">Вт, <?php echo date('d.m', strtotime('+1 day', $mon)) ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-link="Wed">Ср, <?php echo date('d.m', strtotime('+2 day', $mon)) ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-link="Thu">Чт, <?php echo date('d.m', strtotime('+3 day', $mon)) ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-link="Fri">Пт, <?php echo date('d.m', strtotime('+4 day', $mon)) ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-link="Sat">Сб, <?php echo date('d.m', strtotime('+5 day', $mon)) ?></p>
        <p class="lesson__row__date__item<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-link="Sun">Вс, <?php echo date('d.m', strtotime('+6 day', $mon)) ?></p>
		</div>
		
      <div class="lesson__row">

			<div class="col-date<?php if (date('D') == 'Mon') { echo ' active'; } ?>" date-show="Mon">
         	<div class="lesson__date">
            	<p>Пн, <?php echo date('d.m', $mon); ?></p>
				</div>
			 
			<?php 
			 	for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col1_bg'. $i] != "#000000") { echo $options['pn_col1_bg'. $i]; } ?>'>
			 		<input type="color" name='lessons_option4[pn_col1_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col1_bg'. $i]; ?>' placeholder="#fff">
            	<p><input type="text" name='lessons_option4[pn_col1_text<?php echo $i; ?>]' value='<?php echo $options['pn_col1_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
			 	</div>
			<?php }  ?>
        	</div>

			<div class="col-date<?php if (date('D') == 'Tue') { echo ' active'; } ?>" date-show="Tue">
				<div class="lesson__date">
					<p>Вт, <?php echo date('d.m', strtotime('+1 day', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col2_bg'. $i] != "#000000") { echo $options['pn_col2_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col2_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col2_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col2_text<?php echo $i; ?>]' value='<?php echo $options['pn_col2_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>

			<div class="col-date<?php if (date('D') == 'Wed') { echo ' active'; } ?>" date-show="Wed">
				<div class="lesson__date">
					<p>Ср, <?php echo date('d.m', strtotime('+2 days', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col3_bg'. $i] != "#000000") { echo $options['pn_col3_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col3_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col3_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col3_text<?php echo $i; ?>]' value='<?php echo $options['pn_col3_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>

			<div class="col-date<?php if (date('D') == 'Thu') { echo ' active'; } ?>" date-show="Thu">
				<div class="lesson__date">
					<p>Чт, <?php echo date('d.m', strtotime('+3 days', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col4_bg'. $i] != "#000000") { echo $options['pn_col4_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col4_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col4_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col4_text<?php echo $i; ?>]' value='<?php echo $options['pn_col4_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>

			<div class="col-date<?php if (date('D') == 'Fri') { echo ' active'; } ?>" date-show="Fri">
				<div class="lesson__date">
					<p>Пт, <?php echo date('d.m', strtotime('+4 days', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col5_bg'. $i] != "#000000") { echo $options['pn_col5_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col5_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col5_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col5_text<?php echo $i; ?>]' value='<?php echo $options['pn_col5_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>

			<div class="col-date<?php if (date('D') == 'Sat') { echo ' active'; } ?>" date-show="Sat">
				<div class="lesson__date">
					<p>Сб, <?php echo date('d.m', strtotime('+5 days', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col6_bg'. $i] != "#000000") { echo $options['pn_col6_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col6_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col6_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col6_text<?php echo $i; ?>]' value='<?php echo $options['pn_col6_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>

			<div class="col-date<?php if (date('D') == 'Sun') { echo ' active'; } ?>" date-show="Sun">
				<div class="lesson__date">
					<p>Вс, <?php echo date('d.m', strtotime('+6 days', $mon)); ?></p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card<?php if($options['pn_col'. $i .'_hidden'] == true) { echo ' hidden'; } ?>" data-time="<?php echo checkTime($i); ?>" style='background: <?php if($options['pn_col7_bg'. $i] != "#000000") { echo $options['pn_col7_bg'. $i]; } ?>'>
					<input type="color" name='lessons_option4[pn_col7_bg<?php echo $i; ?>]' value='<?php echo $options['pn_col7_bg'. $i]; ?>' placeholder="#fff">
					<p><input type="text" name='lessons_option4[pn_col7_text<?php echo $i; ?>]' value='<?php echo $options['pn_col7_text'. $i]; ?>' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'disabled'; } ?>></p>
				</div>
			<?php }  ?>
			</div>





			<div class="col-date">
				<div class="lesson__date">
					<p>Скрыть ряд</p>
				</div>
				
				<?php 
					for ($i = 1; $i <= 26; $i++ ) { ?>
				<div class="lesson__card check">
					<input type="checkbox" name='lessons_option4[pn_col<?php echo $i; ?>_hidden]' <?php if($options['pn_col'. $i .'_hidden'] == true) { echo 'checked'; } ?>>
				</div>
			<?php }  ?>
			</div>
		  

		</div>
		
		
  </section>
  <script src="<?php echo $url .'script.js'; ?>"></script>
	
	   
	   <?php
	        settings_fields( 'lessonsCustom4' );
	        do_settings_sections( 'lessonsCustom4' );
	        submit_button('Сохранить');
	    ?>
	</form>
<?php }