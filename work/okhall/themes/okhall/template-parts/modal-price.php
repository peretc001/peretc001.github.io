<?php
/* 
 * Template name: Форма рассчета цены
 */
?>	
<div class="modal-content price__form">
	<form action="/send_price.php" method="post" id="step1">
		<input type="hidden" name="step" value="1">
		<div class="modal-header">
			<h3><?php echo $options['price__modal__p__intro']; ?></h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
				<div class="row">
					<div class="col-12 col-lg-6">
						<p><b><?php echo $options['price__modal__left1']; ?></b></p>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home" type="radio" name="home" value="<?php echo $options['price__modal__right1']; ?>">
							<label for="home"><?php echo $options['price__modal__right1']; ?></label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home2" type="radio" name="home" value="<?php echo $options['price__modal__right2']; ?>">
							<label for="home2"><?php echo $options['price__modal__right2']; ?></label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home3" type="radio" name="home" value="<?php echo $options['price__modal__right3']; ?>">
							<label for="home3"><?php echo $options['price__modal__right3']; ?></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<p><b><?php echo $options['price__modal__left2']; ?></b></p>
					</div>
					<div class="col-2 col-lg-1">
						<p class="text-right">м<sup>2</sup></p>
					</div>
					<div class="col-10 col-lg-2 text-left">
						<input type="tel" name="square" class="form-control form__one__metr" value="" required/>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<p><b><?php echo $options['price__modal__left3']; ?></b></p>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time" type="radio" name="time" value="<?php echo $options['price__modal__right4']; ?>">
							<label for="time"><?php echo $options['price__modal__right4']; ?></label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time2" type="radio" name="time" value="<?php echo $options['price__modal__right5']; ?>">
							<label for="time2"><?php echo $options['price__modal__right5']; ?></label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time3" type="radio" name="time" value="<?php echo $options['price__modal__right6']; ?>">
							<label for="time3"><?php echo $options['price__modal__right6']; ?></label>
						</div>
					</div>
				</div>

				<div class="row no-padding">
					<div class="col-lg-6">
						<input type="text" name="name" class="form-control" value="" placeholder="Ваше имя" required>
						<input type="tel" name="phone" class="form-control" value="" placeholder="Телефон" required>
					</div>
					<div class="col-lg-6">
						<button type="submit" class="form__one__button">Отправить</button>
					</div>
				</div>
				<p class="form__one__bottom text-center"><?php echo $options['price__modal__bottom']; ?></p> 
			
		</div>
	</form>
</div>
		
