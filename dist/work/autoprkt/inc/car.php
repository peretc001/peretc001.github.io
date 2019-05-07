<div id="auto">
	<div class="introHolder">
		<h2>Прокат премиум авто без водителя</h2>
	</div>
	<div class="row">
	  	<?php	$select_car = $db->getAll(' SELECT * FROM `car` WHERE id != "1" ');
					$count = 0;
					foreach ($select_car as $row) { 
					
					if($count != 0 && $count%2 == 0)
						{ ?>
		
		</div>
		<div class="row">
						<?php
							$count = 0;
						}
					?>
		
	  		<div class="one-half column">
     			<a href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/">
     				<img src="/img/auto/<?php echo $row['brand']; ?>/<?php echo $row['model']; ?>/1.jpg">
	     		 </a>
      			<h6><a href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/">Прокат <?php echo $row['name']; ?></a></h6>
     	 		<p class="config">Комплектация: <?php echo $row['complectation']; ?></p>
     	 		<p class="price">Цена от: <span><?php echo $row['price_day']; ?></span> руб.</p>
     	 		<div class="button_center">
     	 			<a class="button button-primary" href="/car/<?php echo $row['brand']; ?>/<?php echo $row['url']; ?>/">Подробнее</a>
     		 	</div>
     		</div>
     	
     	<?php $count++;  } ?>
	</div><!--div class="button_all"><p><a class="button button-all" href="/car/">показать все</a></p></div-->
</div>