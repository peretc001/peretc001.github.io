<?php
/* 
 * Template name: Форма обратной связи
 */
?>	
	<div class="modal-content catalog__form">
    	
    	<form action="/send_catalog.php" method="POST" id="catalog_form">
    		<div class="modal-header">
	    		<p><b><?php echo $options['photos__modal__p__intro']; ?></b></p>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
			<div class="modal-body">
				<div class="row align-items-center">
					<div class="col-lg-4">
						
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Имя" />
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control" required placeholder="Email *" />
							</div>
							<button type="submit" class="btn btn-success">Отправить</button>
						
					</div>
					<div class="col-lg-8">
						<?php echo $options['photos__modal__text']; ?>
					</div>
				</div>
			</div>
		</form>
			
	</div>

