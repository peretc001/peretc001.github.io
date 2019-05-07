<?php
/* 
 * Template name: Форма обратной связи
 */
?>	
	<div class="modal-content catalog__form">
    	
    	<form action="/send_catalog.php" method="POST" id="catalog_form">
    		<div class="modal-header">
	    		<h3><?php echo $options['photos__modal__p__intro']; ?></h3>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
				<p class="blue"><?php echo $options['photos__modal__text1']; ?></p>

				<div class="row align-items-center">
					<div class="col-lg-6 text-center">

						<input type="text" name="name" class="form-control" placeholder="Имя" />
						<input type="email" name="email" class="form-control" required placeholder="Email *" />
					</div>
					<div class="col-lg-6">
						<p class="right"><?php echo $options['photos__modal__text2']; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 text-center">
						<p class="grey"><?php echo $options['photos__modal__text3']; ?></p>
						<button type="submit" class="btn btn-accent">Отправить</button>
					</div>
				</div>
				<div class="row pt-2 justify-content-center">
					<p><?php echo $options['photos__modal__text4']; ?></p>
				</div>
			</div>
		</form>
			
	</div>

