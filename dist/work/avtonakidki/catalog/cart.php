<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');
	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Корзина - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="" /> 
	<meta name="Description" content="" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / Корзина
	</div>
	
	<div class="cart">
	
		<div class="introHolder">
			<h1>Корзина:</h1>
		</div>
				
		<?php 	$product = $db->getAll('SELECT * FROM cart WHERE sid = ?s ORDER by id asc ', $sid);
					if ($product == null) { echo "<br><h2 align='center'>В корзине еще нет товаров!</h2></div><br>"; } else {
					foreach($product as $row) {
		?>
		
		<div class="row">
			<div class="left">
				<div class="three columns img">
					<a href="<?php echo $row['url']; ?>"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				</div>
				<div class="three columns name">
					<p><b><a href="<?php echo $row['url']; ?>"><?php echo $row['product_name']; ?></a></b></p>
					<p class="model"><?php echo $row['size']; ?></p>
					<p class="model">Цена: <b><?php echo number_format($row['price'], 0, ',', ' '); ?></b> р.</p>
				</div>
			</div>
			<div class="right">
				<div class="two columns qty">
					<p><?php if ($row['qty'] == 1) { } else { ?><a class="plus" href="/catalog/inc/clear.php?id=<?php echo $row['id']; ?>&amp;type=minus">-</a> <?php } ?>
						<?php echo $row['qty']; ?>
						<a class="minus" href="/catalog/inc/clear.php?id=<?php echo $row['id']; ?>&amp;type=plus">+</a></p>
				</div>
				<div class="two columns price">	
					<p><?php echo number_format($row['total'], 0, ',', ' '); ?> р.</p>
				</div>
				<div class="two columns del">
					<a class="del" href="/catalog/inc/clear.php?id=<?php echo $row['id']; ?>&amp;type=delit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<?php }  $product_total = $db->getRow('SELECT SUM(total) as sum FROM cart WHERE sid = ?s ', $sid); ?>
		
		<div class="row total">
			<div class="u-pull-left del">
				<p><a href="/catalog/inc/clear.php?session_id=<?php echo session_id(); ?>&amp;type=clear"><i class="fa fa-trash-o clear" aria-hidden="true"></i> Удалить все</a></p>
			</div>
			<div class="u-pull-right price">
				<p><span><?php echo number_format($product_total['sum'], 0, ',', ' ');?></span> p.</p>
			</div>
		</div>
		<p class="center">Для оформления заказа заполните, пожалуйста, поля формы или просто позвоните нам по телефону: <b>8 (918) 636-27-09</b></p>
		
	</div>
	<div class="cart_form">
		<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(function($){
			   $("#phone").mask("8-999-999-99-99");
			});
		</script>
		<form action="/catalog/inc/zakaz.php" method="post" id="zakaz">
		<div class="row">
			<div class="four columns">
				<label for="phone" class="control-label">Номер телефона: <span>*</span></label>
				<input id="phone" type="tel" class="u-full-width form-control" name="phone" placeholder="Номер телефона" required>				
				</div>
			<div class="four columns">
				<label for="email" class="control-label">E-mail: <span>*</span></label>
				<input id="email" type="email" class="u-full-width form-control" name="email" placeholder="Ваш email" required>
			</div>
			<div class="four columns">
				<label for="user" class="control-label">ФИО:  <span>*</span></label>	
				<input id="user" type="text" class="u-full-width form-control" name="user" placeholder="ФИО" required>
			</div>
			
		</div>
		<div class="row">
			<div class="four columns">
				<label for="city" class="control-label">Город:  <span>*</span></label>
				<input id="city" type="text" class="u-full-width form-control" name="city" placeholder="Город" required>				
				</div>
			<div class="eight columns">
				<label for="msg" class="control-label">Коментарий</label>	
				<textarea id="msg" name="msg" class="u-full-width" placeholder="Коментарий" rows="6"/></textarea>
			</div>
		</div>
		<div class="row">		
			<div class="policy">
				<span><input type="checkbox" name="policy" id="policy_control" class="form-control" checked required/></span> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span>
			</div>
		</div>
		<div class="row">
			<br>
			<input name="button" type="submit" value="ОФОРМИТЬ" class="button button-primary" 
				onsubmit="ym(50831057, 'reachGoal', 'AV_ORDER'); return true;">
		</div>
		</form>	
	</div>
	<?php } ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>