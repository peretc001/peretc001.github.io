<div class="top_products">
	<div class="introHolder">
		<h3>Товары из других категорий</h3>
	</div>
	<div class="row">
		<?php if ($category != 'mex') {  
			$row = $db->getRow('SELECT * FROM products WHERE category = "mex" ');
		?>
		<div class="three columns">
			<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Меха</a></h3>
			<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/2.jpg"></a>
			<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
		</div>
		<?php } if ($category != 'sheep') {  
			$row = $db->getRow('SELECT * FROM products WHERE category = "sheep" ');
		?>
		<div class="three columns">
			<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Овчины</a></h3>
			<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/3.jpg"></a>
			<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
		</div>
		<?php } if ($category != 'alcantara') { 
			$row = $db->getRow('SELECT * FROM products WHERE category = "alcantara" ');
		?>
		<div class="three columns">
			<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Алькантары</a></h3>
			<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/6.jpg"></a>
			<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
		</div>
		<?php } if ($category != 'len') {  
			$row = $db->getRow('SELECT * FROM products WHERE category = "len" ');
		?>
		<div class="three columns">
			<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Льна</a></h3>
			<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
			<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
		</div>
		<?php } if ($category != 'velure' and $category != 'kids') { 
			$row = $db->getRow('SELECT * FROM products WHERE category = "velure" ');
		?>
		<div class="three columns">
			<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Велюра</a></h3>
			<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
			<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
		</div>
		<?php } ?>
	</div>
</div>