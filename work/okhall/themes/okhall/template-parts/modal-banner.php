<?php
/* 
 * Template name: Форма обратной связи
 */
?>	
	<div class="modal-content okhall-modal">

		<form action="/send.php" method="POST" class="okhall-form">
			<input type="hidden" name="step" value="1">
			<input type="hidden" name="block" value="Перепланировка">
	    	<div class="modal-header">
	    		<h3><?php echo $options['banner__modal__p__intro']; ?></h3>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
			<div class="modal-body">
				<div class="row align-items-center">
					<div class="col-lg-4 text-center">
						
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Имя" />
							</div>
							<div class="form-group">
								<input type="tel" name="phone" class="form-control" required placeholder="Телефон *" />
							</div>
							<button type="submit" class="btn btn-accent">Отправить</button>
						
					</div>
					<div class="col-lg-8">
						<p class="right">
							<?php echo $options['banner__modal__text1']; ?><br>
							<?php echo $options['banner__modal__text2']; ?><br>
							<?php echo $options['banner__modal__text3']; ?></p>
					</div>
				</div>
			</div>
		</form>

	</div>

