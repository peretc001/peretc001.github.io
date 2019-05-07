<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Отзывы | ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="поликарбонат отзывы, теплицы отзывы" /> 
	<meta name="Description" content="Оставь свой отзыв" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / Отзывы
	</div>
	
	<div class="page">
		<div class="introHolder">
			<h1>Отзывы</h1>
		</div>
			

		<div class="row">
			<p>Будем очень признательны Вам за отзыв. Все очень просто:</p>
			<ul>
				<li>Заполните несколько полей <a href="/otziv.php#otziv">формы</a></li>
				<li>Загрузите фотографию.</li>
				<li class="dop">Или просто отправьте отзыв с фотографией по WhatsApp на номер <span>8-918-636-27-09</span></li>
			</ul>
		</div>
		<div class="teplica_review">
			<?php $ot = mysql_query("SELECT * FROM `gb` ORDER by dt DESC	");	
					while( $row = mysql_fetch_array($ot) )
			{ ?>
			<div class="row">
				<div class="left">
					<?php if($row['img'] != '') { ?>
						<a class="img" href="upload/<?php echo $row['img']; ?>"><img src="upload/<?php echo $row['img']; ?>" alt="<?php echo $row['alt']; ?>"></a>
					<?php } else {
						echo '<img src="upload/avatar.png">';
					} ?>
				</div>
				<div class="right">
					<p><b id="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></b>
					<?php 	
									
						for ($a = 1; $a <= 5; $a++) {
							if ($a > $row['total_value'])  // если значение переменной $a равно 5
								goto end;  // то переходим к выполнению инструкций следующих за меткой   
								echo '<i class="fa fa-star" aria-hidden="true"></i>';
							}
							end:
								for ($c = $a; $c <= 5; $c++)
								echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
							
					?>
					<p align="justify"><?php echo $row['msg']; ?></p>
				</div>
			</div>
			<?php }  ?>
		</div>
		<div class="otziv_form">
			<div class="introHolder">
				<h3 id="otziv">Добавить отзыв</h3>
			</div>
			<form action="inc/add_otziv.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="four columns">
						<label for="username" class="control-label">Имя:  <span>*</span></label>	
						<input id="username" type="text" class="u-full-width form-control" name="username" placeholder="Имя" required>
					</div>
					<div class="four columns">
						<label for="phone" class="control-label">Телефон</label>
						<input id="phone" type="tel" class="u-full-width form-control" name="phone" placeholder="Телефон не публикуется">	
					</div>
					<div class="four columns star">
						<label class="control-label">Ваша оценка <span>*</span></label>
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
					<div class="eight columns">
						<label for="msg" class="control-label">Отзыв <span>*</span></label>	
						<textarea id="msg" name="msg" class="u-full-width" placeholder="Ваш отзыв" rows="6"  required/></textarea>
					</div>
				
					<link rel="stylesheet" href="/upload/!uploadjs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
					<link rel="stylesheet" href="/upload/!uploadjs/css/drop_uploader.css">

					<script src="/upload/!uploadjs/js/jquery-3.2.1.js"></script>
					<script src="/upload/!uploadjs/js/drop_uploader.js"></script>

					<script>
						$(document).ready(function(){
							$('input[type=file]').drop_uploader({
								uploader_text: 'Перетяните файл или нажмите',
								browse_text: 'Выбрать',
								only_one_error_text: 'Only one file allowed',
								not_allowed_error_text: 'File type is not allowed',
								big_file_before_error_text: 'Files, bigger than',
								big_file_after_error_text: 'is not allowed',
								allowed_before_error_text: 'Only',
								allowed_after_error_text: 'files allowed',
								browse_css_class: 'button button-primary',
								browse_css_selector: 'file_browse',
								uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
								file_icon: '<i class="pe-7s-file"></i>',
								time_show_errors: 5,
								layout: 'thumbnails',
								method: 'normal',
								url: '/upload/!uploadjs/ajax_upload.php',
								delete_url: '/upload/!uploadjs/ajax_delete.php',
							});
						});
					</script>

					<div class="four columns photo_upload">
						<div class="upload">
							<label for="upfile" class="control-label">Фотография</label>
							<input id="upfile" type="file" name="file" accept="image/*">
							
						</div>
					</div>
				</div>		
				
				<div class="row go">		
					<ul class="policy">
						<li><input type="checkbox" name="policy" id="policy" checked/></li><li>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></li>
					</ul>
					<p><input name="button" type="submit" value="ОФОРМИТЬ" class="button button-green"></p>
				</div>
			</form>
		</div>
	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>