<div id="product_otziv">	
	<h2>Отзывы</h2>
	<?php
		if ($url == "13" or $url == "14-01r-k" ) { $url = '14'; }
		elseif ($url == "13-01" or $url == "13-01-d" or $url == "14-01r-d" ) { $url = '14-01'; }
		elseif ($url == "14-02r-d" ) { $url = '14-02'; }
		elseif ($url == "17-14" or $url == "17-15") { $url = '17-04m'; }
		elseif ($url == "24-01") { $url = '24'; }
		
		$query = mysql_query("SELECT * FROM `gb` WHERE url = '$url' ");
		$query=mysql_fetch_assoc($query); 
			
			#Если нет отзывов
			if($query['total_votes'] == null) { ?>
				<div class="row"><div class="introHolder center"><p>Отзывов пока нет.</p></div></div>
			<?php } else {
			
			$res = mysql_query("SELECT COUNT(id) FROM `gb` WHERE url = '$url' ");
						$row = mysql_fetch_row($res);
						$qtys = $row[0]; // всего записей
						$qty = $qtys - 1;  
	?>
		<?php 	$ot = mysql_query("SELECT * FROM `gb` WHERE url = '$url' ORDER by dt DESC limit 1 ");	
				$row = mysql_fetch_array($ot);
				
				$review_id = $row['id'];
		?>
		<div class="row">
			<div class="one-third column">
				<?php 	if($row['img'] != '') { ?><div class="wrap"><a href="/upload/<?php echo $row['img']; ?>"><img src="/upload/<?php echo $row['img']; ?>"></a></div><?php 
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
		<div class='add_otziv' id="hsBack">
			<?php if($qty > 0) { ?><a class="button" role="button" data-toggle="collapse" href="#all_review" aria-expanded="false" aria-controls="collapseExample">показать еще <?php echo $qty; ?></a><?php } ?>
			<a class="button add" role="button" data-toggle="collapse" href="#add_review" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus-circle" aria-expanded="true"></i> Добавить отзыв</a>
			<?php 
				if ($url == '14-01' or $url == '14-02' or $url == '24' or $url == '17-03') { ?>
				<div class="add_your_otziv">
					Оставь отзыв с фото данной модели и получи 100р на мобильный
				</div>
			<?php } ?>
		</div>
		<div class="all_otziv">
			<div class="collapse" id="all_review">
				<?php 	$ot = mysql_query("SELECT * FROM `gb` WHERE url = '$url' and id != '$review_id' ORDER by dt DESC");	
						while( $row = mysql_fetch_array($ot) ) { 
				?>
				<div class="row">
					<div class="one-third column">
						<?php 	if($row['img'] != '') { ?><div class="wrap"><a href="/upload/<?php echo $row['img']; ?>"><img src="/upload/<?php echo $row['img']; ?>"></a></div><?php 
								} else { echo '<i class="fa fa-picture-o" aria-hidden="true"></i>'; } ?>
					</div>
					<div class="two-thirds column justify">
						<p><?php 	
							
							for ($a = 1; $a <= 5; $a++) {
								if ($a > $row['total_value'])  // если значение переменной $a равно 5
									goto ends;  // то переходим к выполнению инструкций следующих за меткой   
									echo '<i class="fa fa-star" aria-hidden="true"></i>';
								}
								ends:
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
				<?php }  ?>
			</div>
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
							<script>
								$(document).ready( function() {
									$(".file-upload input[type=file]").change(function(){
										 var filename = $(this).val().replace(/.*\\/, "");
										 $("#filename").val(filename);
										 $(".file-upload span").hide();
									});
								});
							</script>
							<!--p><input type="file" class="file" name="userfile" class="form-control" required/></p-->
						</div>
					</div>
					<div class="row">
						<div class="policy"><input type="checkbox" name="policy" id="policy" class="check" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></div>
						<input class="button button-all" type="submit" value="Добавить">
					</div>
				</form>
			</div>
		</div>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</div>