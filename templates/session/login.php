<div class="container">

<?php
    include ('scripts/login.php');
?> 
    <!-- Modal -->
    <div class="modal fade" id="modalLogin">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Añade un <?php echo $objetivo; ?></h4>
				</div>
				<div class="modal-body">
					<div class="container">
                        <?php include 'templates/session/login-form.php'; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cierra</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    
</div>

