<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Парта Деми - Отзывы</title> 
	<meta name="Keywords" content="парта деми отзывы" /> 
	<meta name="Description" content="Отзывы о детской мебели (парта, стул) ДЭМИ" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Отзывы
		</div>
	</div>
	<div id="product_otziv">	
		<h1>Отзывы</h1>
		<div class="add_otziv">
			<a class="button add" data-toggle="collapse" href="#add_review" role="button" aria-expanded="false" aria-controls="add_review"><i class="fa fa-plus-circle" aria-expanded="true"></i> Добавить отзыв</a>
		</div>
		
		<div class="otziv_form">
			<div class="collapse" id="add_review">
				<form action="/inc/form/add_otziv.php" method="post" enctype="multipart/form-data" id="valid_otziv" role="form" data-togg="validator">
					<input type="hidden" name="url" value="<?php echo $url; ?>"/>
					<input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"] ?>"/>	
					<input type="hidden" name="back_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>	
					<input type="hidden" name="category" value="<?php echo $category; ?>"/>	
					<input type="hidden" name="art" value="cyt<?php echo $art; ?>"/>
					<div class="row">
						<div class="five columns">
							<div class="form-group">
							<label for="username" class="control-label">Имя</label>
							<input data-minlength="3" class="u-full-width" type="text" name="username" placeholder="Ваше имя" id="username" class="form-control" required>
							</div>
						</div>
						<div class="five columns">
							<label>Оценка</label>
							<div class="star-rating">
								<div class="star-rating__wrap">
									<input class="star-rating__input" id="star-rating-5" type="radio" name="total_value" value="5">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 из 5"></label>
									<input class="star-rating__input" id="star-rating-4" type="radio" name="total_value" value="4">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 из 5"></label>
									<input class="star-rating__input" id="star-rating-3" type="radio" name="total_value" value="3">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 из 5"></label>
									<input class="star-rating__input" id="star-rating-2" type="radio" name="total_value" value="2">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 из 5"></label>
									<input class="star-rating__input" id="star-rating-1" type="radio" name="total_value" value="1">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 из 5"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="eleven columns">
							<label for="msg"  class="control-label">Отзыв</label>
							<textarea class="u-full-width" placeholder="Ваш отзыв" name="msg" id="msg" class="form-control" data-minlength="5" required></textarea>
						</div>
					</div>
					<div class="row">
						<div class="eleven columns">
							<label for="userfile" class="control-label photo">Фотография вашей парты:</label>
							<div class="file-upload">
								<label>
									<input type="file" name="userfile"/>
									<span><i class="fa fa-plus-circle" aria-expanded="true"></i> Добавить</span>
								</label>
							</div>
							<input type="text" id="filename" class="filename" disabled>
						</div>
					</div>
					<div class="row">
						<div class="policy"><input type="checkbox" name="policy" id="policy" class="check" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></div>
						<input class="button button-all" type="submit" value="Добавить">
					</div>
				</form>
			</div>
		</div>		
	
		<div class="all_otziv gallery_otziv">
			<?php	$enable_otziv = 'yes';
					$enable_gallary = 'yes';

					$res = mysql_query("SELECT COUNT(id) FROM `gb`");
					$row = mysql_fetch_row($res);
					$qtys = $row[0]; // всего записей
					$qty = $qtys - 1;  
			
				 	$ot = mysql_query("SELECT * FROM `gb` ORDER by dt DESC");	
						while( $row = mysql_fetch_array($ot) ) { 
				
						$review_id = $row['id'];
			?>
			<div class="row">
				<div class="one-third column">
					<?php 	if($row['img'] != '') { ?><div class="wrap"><a class="gallery_item" href="/upload/<?php echo $row['img']; ?>"><img src="/upload/<?php echo $row['img']; ?>" alt=""></a></div><?php 
							} else { echo '<i class="fa fa-picture-o" aria-hidden="true"></i>'; } ?>
				</div>
				<div class="two-thirds column justify">
					<p style="text-align:left;"><?php 	
									
						for ($a = 1; $a <= 5; $a++) {
							if ($a > $row['total_value'])  // если значение переменной $a равно 5
								goto end;  // то переходим к выполнению инструкций следующих за меткой   
								echo '<i class="fa fa-star" aria-hidden="true"></i>';
							}
							end:
								for ($c = $a; $c <= 5; $c++)
								echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
							
					?> <span class="user"><?php echo $row['username']; ?></span> <span class="u-pull-right"><?php echo $date = date("Y-m-d", strtotime($row['dt'])); ?></span></p>
					<p><?php echo $row['msg']; ?></p>
					<?php if ($row['answer'] != '') { ?>
						<i class="fa fa-level-down" aria-hidden="true"></i>
						<div class="answer"><p><?php echo $row['answer']; ?></p></div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>