<?php if (isset($_SESSION["usuario"])) {
    ?>
<!-- Modal -->
    <div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content"> 
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Añade un <?php echo $objetivo; ?></h4>
				</div>
				<div class="modal-body">
					<div id="container" class="container">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cierra</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="container">
	<?php if ($tabla != 'balance'){ ?>

        <a data-toggle="modal" href="#myModal" class="btn btn-info btn-lg">Crea un <?php echo $objetivo; ?></a>
        <?php } 
if ($tabla=='balance'){ 
	include 'scripts/balance.php';
}
?>
        <br><br>
        <table id="tabla" class="table table-striped table-hover">
		</table>
	</div>
	<footer class="footer">
		<form action='scripts/do-pdf.php' method='post'>
			<input type='hidden' name='logoBueninvento' value='yes' class='logo laclase'>
			<input type='hidden' name='datosBueninvento' value='yes' class='bueninvento laclase'>
			<input type='hidden' name='datosFactura' value='yes' class='datos laclase'>
			<input type='hidden' name='variable' value='yes' class='texto laclase'>
			<input type='hidden' name='datosCliente' value='yes' class='cliente laclase'>
			<button type="submit" class="btn makePDF" style="display:none;">Versión PDF</button>
		</form>
	</footer>
<?php
} else {
?>
<div class="container">
    <?php include 'templates/session/login-form.php'; ?>
</div>

<?php
}
?>

