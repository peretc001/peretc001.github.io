<?php
/* 
 * Template name: Форма обратной связи
 */
?>	
	<div class="modal-content okhall-modal">

		<form action="/send.php" method="POST" class="okhall-form">
			<input type="hidden" name="block" value="Оператор">
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
								<input type="email" name="email" class="form-control" required placeholder="Email *" />
							</div>
							<button type="submit" class="btn btn-accent">Отправить</button>
						
					</div>
					<div class="col-lg-8">
						<?php echo $options['banner__modal__text']; ?>
					</div>
				</div>
			</div>
		</form>

	</div>

