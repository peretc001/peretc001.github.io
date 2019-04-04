<article id="auto" class="more">
	<div class="introHolder">
		<h2>Еще автомобили на прокат</h2>
	</div>
	<div class="row">
		<?php
			$select_other_car = $db->getAll('SELECT * FROM `car` WHERE url != ?s and id != "1" limit 2', $url);
			foreach ($select_other_car as $row) {
		?>
	
		<div class="one-half column more" align="center">
			<a class="example-screenshot-wrapper" href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/">
				<img class="example-screenshot" src="/img/auto/<?php echo $row['brand']; ?>/<?php echo $row['model']; ?>/1.jpg">
			 </a>
			<h6 class="example-header"><a href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/"><?php echo $row['name']; ?></a></h6>
			<p class="config">Комплектация: <?php echo $row['complectation']; ?></p>
			<p class="price">Цена от: <span><?php echo $row['price_day']; ?></span> руб.</p>
			<div class="button_center">
				<a class="button button-primary" href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/">Подробнее</a>
			</div>
		</div>
	
		<?php } ?>
	</div>
	<div class="clear"></div>
    <div class="line"></div>
    <div class="button_all"><p><a class="button button-all" href="/car/">показать все</a></p></div>
</article>