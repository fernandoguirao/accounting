		<div id="modales">
		</div>

    <script src="static/js/jquery-1.10.1.min.js"></script>
		<script src="static/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="https://www.dropbox.com/static/api/1/dropins.js" id="dropboxjs" data-app-key="2u43rphuwvo5xys"></script>
		<script src="static/js/dateToSpanish.js"></script>
    <script src="static/js/app.php?page=<?php echo $tabla ?>&select=<?php echo $selectDB ?>"></script>
    <script src="static/js/edit-table.js"></script>
    		        <script src="static/js/raphael.js"></script>
        <script src="static/js/popup.js"></script>
    <script src="static/js/tablaSVG.js"></script>
<?php if (!isset($_SESSION["usuario"])) { ?>
    <script type="text/javascript">
        $('.pull-left').hide();
        
    </script>
<?php } else { ?>
    <script type="text/javascript">
        $('.laclase').val('<table>'+$('#tabla').html()+'</table>');
        /* $('.muestra').text($('#tabla').html()); */
        function botonPDF(este){
	        valor = $(este).parent().parent().find('#restoPDF').html();
	        valorLogo = $(este).parent().parent().find('#logoF').html();
	        valorDatos = $(este).parent().parent().find('#datosHeader').html();
	        valorBueninvento = $(este).parent().parent().find('.cIzq').html();
	        valorCliente = $(este).parent().parent().find('.cDer').html();

	        /* $('.laclase').val(valor); */
	        $('.logo.laclase').val(valorLogo);
	        $('.datos.laclase').val(valorDatos);
	        $('.bueninvento.laclase').val(valorBueninvento);
	        $('.cliente.laclase').val(valorCliente);
	        $('.texto.laclase').val(valor);
	        $('.makePDF').trigger('click');
        }
        $('.hideParent').each(function(){
					$(this).addClass('ocultamos');
					nombre = $(this).text();
					$('.'+nombre).addClass('ocultamos');
		});
		
		/* CAMBIAMOS POR BOTONES LAS FACTURAS */
		oldFactura = "";
		$('.Factura').each(function(){
			oldFactura = "";
			oldFactura = $(this).html();
			if (oldFactura.length > 0){
			nuevaFactura = '<a href='+oldFactura+' target="_blank" class="btn btn-success btn-xs">Descarga</a>';
			$(this).html(nuevaFactura);
			}
		})

</script>
<?php } ?>

</body>
</html>