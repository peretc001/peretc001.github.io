<?php 
    $options = get_option( 'optimazedLanding_settings' );
    $phone  = $options['phone'];
    $phone_number = preg_replace('~\\D+~u', '', $phone); //71234567890
?>
<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 footer-form">
					<h5>Напишите нам</h5>
					<form action="/" class="callback__form" method="post">
						<input type="hidden" name="recipient" value="Напишите нам">
						<div class="row">
							<div class="col-md-5">
								<input type="text" name="name" class="form-control" value="" placeholder="Имя">
								<input type="text" name="phone" class="form-control tel" value="" placeholder="Телефон" required>
							</div>
							<div class="col-md-7">
								<textarea name="msg" class="form-control" placeholder="Комментарий"></textarea>
							</div>
						</div>
						<div class="policy__checked">
							<div class="radio">
								<input id="policy_callback" type="checkbox" name="policy" checked="">
								<label for="policy_callback">Согласен с условиями</label> <a href="/policy/" target="_blank">Политики конфиденциальности</a>
							</div>
						</div>
						<div class="robot">
							<div class="circle-loader">
								<div class="checkmark draw"></div>
							</div>
							<span>подтверждаю, что я не робот</span>
						</div>
						<button class="btn btn-accent callback__form__button" disabled>Отправить заявку</button>
					</form>
				</div>
				<div class="col-md-6">
					<h5>Наши контакты</h5>
					<div class="footer-contact">
						<p><b><?php echo $options['name']; ?></b></p>
						<p><i class="fas fa-mobile-alt"></i> Тел: <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone; ?></a></p>
						<p><i class="far fa-clock"></i> График: <?php echo $options['work']; ?></p>
					</div>
					<div class="footer-social">
						<p>Мы в соц.сетях</p>
						<a href="<?php echo $options['build_facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
						<a href="<?php echo $options['build_vk']; ?>"><i class="fab fa-vk"></i></a>
						<a href="<?php echo $options['build_instagramm']; ?>"><i class="fab fa-instagram"></i></a>
					</div>
					<div class="clear"></div>
					<div class="author">
						<p>Разработка {<a href="https://peretc001.github.io/">КИ</a>}</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="toTop">
		<i class="far fa-caret-square-up"></i>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="callbackModal" tabindex="-1" role="dialog" aria-labelledby="Заказать звонок" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalCenterTitle">Заказать звонок</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Оставьте свой номер телефона и мы перезвоним вам</p>
				<form action="/" class="callback__form" method="post">
					<input type="hidden" name="recipient" class="recipient" value="">
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="tel" name="phone" class="form-control tel" placeholder="Телефон" required>
						</div>
						<div class="form-group col-md-6">
							<button class="btn btn-accent callback__form__button" disabled>Отправить заявку</button>
						</div>
					</div>
					<div class="policy__checked">
						<div class="radio">
							<input id="policy_callback_footer" type="checkbox" name="policy" checked="">
							<label for="policy_callback_footer">Согласен с условиями</label> <a href="/policy/" target="_blank">Политики конфиденциальности</a>
						</div>
					</div>
					<div class="robot">
						<div class="circle-loader">
							<div class="checkmark draw"></div>
						</div>
						<span>подтверждаю, что я не робот</span>
					</div>
					
				</form>
			</div>
		  </div>
		</div>
      </div>
      
<?php wp_footer() ?>
<?php $options = get_option( 'optimazedMetrica_settings' ); 
	echo $options['yandex'];
?>