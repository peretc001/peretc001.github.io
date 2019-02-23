<?php
/* 
 * Template name: Форма рассчета цены
 */
?>	
<div class="modal-content price__form">
	<form action="/send_price.php" method="post" id="step1">
		<input type="hidden" name="step" value="1">
		<div class="modal-header">
			<p><b>Для расчета нам нужно знать:</b></p>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
				<div class="row">
					<div class="col-12 col-lg-6">
						<p><b>Какой у вас тип жилья?</b></p>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home" type="radio" name="home" value="квартира">
							<label for="home">квартира</label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home2" type="radio" name="home" value="таунхайс">
							<label for="home2">таунхайс</label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="home3" type="radio" name="home" value="коттедж">
							<label for="home3">коттедж</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<p><b>Примерная площадь?</b></p>
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
						<p><b>Когда планируете приступить к ремонту?</b></p>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time" type="radio" name="time" value="в ближайшее время">
							<label for="time">в ближайшее время</label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time2" type="radio" name="time" value="ждем сдачи дома">
							<label for="time2">ждем сдачи дома</label>
						</div>
					</div>
					<div class="col-4 col-lg-2">
						<div class="radio">
							<input id="time3" type="radio" name="time" value="не срочно">
							<label for="time3">не срочно</label>
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
				<p class="form__one__bottom text-center">
					В рабочее время (с 10:00 до 20:00) перезвоним в течение 30 минут. В выходные в течение 1 часа
				</p> 
			
		</div>
	</form>
</div>
		
