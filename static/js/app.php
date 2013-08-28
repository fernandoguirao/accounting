<?php 
    $tabla = $_GET['page'];
    $excludeDB = $_GET['select'];
    
    include '../../scripts/variables.php'
?>

		/* <!-- SI ES BALANCE --> */

<?php
	if ($tabla =='balance'){ ?>
balanceArray.sort();

/*
<!--
var balance='';
var fechan;
for (var elementos in balanceArray){
	fechan = balanceArray[elementos][0];
	balance+= formatDate(fechan);
	balance+='-';
		balance+=balanceArray[elementos][1];
		balance+='<br>';
	
}
-->
*/
var balance='';
var fechan;
var suma= 0;
var total = 0;
var sumando= 0;
balance+= "<table id='bbt' class='table table-striped table-hover'><thead><tr><th>Fecha</th><th>Concepto</th><th>Cantidad</th><th>Total en cuenta</th></tr></thead><tbody>";
for (var elementos in balanceArray){
	balance+='<tr>';
	fechan = balanceArray[elementos][0];
	balance+= '<td>'+formatDate(fechan)+'</td>';
	balance+='<td>'+balanceArray[elementos][1]+'</td>';
		balance+='<td class="amountSumar">'+balanceArray[elementos][2]+'</td>';
		balance+='<td class="amountSuma"></td>';
		balance+='</tr>';
}
balance+='</tbody></table>';
document.getElementById('balanceTabla').innerHTML=balance;
$('.amountSumar').each(function(){
	sumando = parseInt($(this).html());
	total= sumando+total;
	$(this).parent().children('.amountSuma').html(total);
	
});

<?php } else { ?>
        /* 0. DATOS INICIALES */
        
		/* <!--------------------------------->
		<!--! 1. CREACIÓN DE FORMULARIOS ----->
		<!------------------------------------> */
		
		
        
		var formulario = "";
		
		/* Función para crear el formulario */
		var crearFormulario = function(fieldset){
		
			formulario = "<form action='' method='POST'><fieldset>"+/*<legend>"+fieldset+"</legend>*/"<input type='hidden' value='' name='formCrear'>";
			
			for (var valores in table) {
				
				/* Cabecera del formulario */
				if (table[valores][1] != "hidden") {
					formulario += '<div class="form-group"><label>'+table[valores][0]+'</label>'
				}
				
				/* Campos */
				if(table[valores][0] === "IVA") {
					formulario += "<input id='iva-form' class='form-control' type='text' value='' name='"+valores+"'>";
				} else if (table[valores][0] === "Cantidad"){
					formulario += "<input id='amount-form' class='form-control' type='text' value='' name='"+valores+"'>";
				} else if (table[valores][1] === "text") {
					formulario += "<input class='form-control' type='text' value='' name='"+valores+"'>";
				} else if (table[valores][1] === "foreign") {
					formulario += "<select class='form-control' name='"+valores+"'>";
					for (i=0; i<table[valores][2].length;i++) {
							formulario += "<option value='"+table[valores][2][i][1]+"'>"+table[valores][2][i][0]+"</option>";
					}
					formulario += "</select>";
				} else if (table[valores][1] === "select") {
					formulario += "<select class='form-control' name='"+valores+"'>";
					for (i=0;i<table[valores][2].length;i++) {
						formulario += "<option value='"+table[valores][2][i]+"'>"+table[valores][2][i]+"</option>";
					}
					formulario += "</select>";
				} else if (table[valores][1] === "date") {
					formulario += "<input class='form-control' type='date' value='' name='"+valores+"'>";
				} else {
					formulario += "<input type='hidden' value='' name='"+valores+"'>";
				}
				
				formulario += '</div>';
			}
			
			/* Cierre del formulario */
			formulario += '<input class="btn btn-primary" value="Enviar" type="submit"></fieldset></form>';
			
			/* Imprimimos en el DOM */
			document.getElementById("container").innerHTML=formulario;
		}
		
		crearFormulario ('Añade un gasto');
		
		
		/* <!--------------------------------->
		<!--! 2. IMPRESIÓN DE DATOS ---------->
		<!------------------------------------> */
		
		/* El constructor */
		
		var variables = [];
		
		for (var valoresz in table) {
				variables.push(valoresz);
		}
		
		function constructor(variables) {
				var i = 0;
				for (var valoresn in table) {
						this["'"+valoresn+"'"] = variables[i];
						i++;
				}
		}
				
				
		/* Objeto principal que construirá los resultados */
				
		var resultados = {
			<?php include '../../scripts/constructor.php'; ?>
		};
		
		var losResultados = "";
		var elModal = "";
		/* Función para crear la tabla de resultados */
		var crearResultados = function(){
		
			/* Cabecera de la tabla */
			losResultados += "<tr>";
			for (var elvalor in table) {
				if(table[elvalor][1] != "semi-hidden"){
					losResultados += '<th>'+ table[elvalor][0] + '</th>';
				} else {
					losResultados += '<th class="hideParent">'+ table[elvalor][0] + '</th>';
				}
			}
			losResultados += "<th></th></tr>";
			
			var varid = 0;
			
			for (var valores in resultados) {
				
                $k = 0;

					losResultados += '<tr class="edit-table">';
					
				for (var subvalor in resultados[valores]) {
					

					if ($k === 0) {
						varid = resultados[valores][subvalor];
					}

						losResultados += '<td>'+resultados[valores][subvalor]+'</td>';
					
					$k++;
					
				}

				
				losResultados += "<td class='no-edit btn-ocultos'><form action='' method='POST'><input type='hidden' name='id' value='";
                
				losResultados += varid;
				losResultados += "' id='id'><input class='btn btn-danger btn-block btn-xs' value='Borrar' type='submit'></form>";
				losResultados += "<?php if ($tabla == 'incoming'){ ?><a href='#factura"+valores+"' data-toggle='modal' class='btn btn-info factura btn-block btn-xs'>Factura</a><?php } ?></td></tr>";
				<!-- MODAL PARA REALIZAR FACTURAS -->
				elModal += "<span></span>";
				
					<?php if ($tabla != 'clients_and_suppliers'){
						include '../../scripts/modal-facturas.php'; 
					}
					?>
				
				<!-- FIN DE MODAL PARA REALIZAR FACTURAS -->
			}
			
			/* Cierre del formulario */
			losResultados += '</table>';
			
			/* Imprimimos en el DOM */
			document.getElementById("tabla").innerHTML=losResultados;
			document.getElementById("modales").innerHTML=elModal;
				$('td').each(function(){
					var indice = $(this).index()+1;
					var clase = $("th:nth-child(" + indice + ")").html();
					var clas = clase.substr(0,clase.indexOf(' '));
					$(this).addClass(clas);
				});
				$('.edit-table .Fecha,.fechan').each(function(){
					var fecha = $(this).html();
					
					var fechaSp = formatDate(fecha);
					$(this).html(fechaSp);
				});
		}
		
		
		crearResultados();
		
		/* DUPLICAR TEXTO IMPUESTOS */
		$('#amount-form').blur(function(){
			$('#iva-form').val(($('#amount-form').val()*21)/100);
		});
		
		var cantidadtotal;
		$('.Cantidad').each(function(){
			cantidadtotal += parseFloat($(this).html());
		});
		console.log(cantidadtotal);
		
		<!-- CONSTRUCTOR DE RECIBOS -->
		function constructorRecibo(variables) {
				var i = 0;
				for (var valoresn in table) {
						this["'"+valoresn+"'"] = variables[i];
						i++;
				}
		}
		
				var resultadosRecibos = {
			<?php include '../../scripts/constructorRecibo.php'; ?>
		};
		
<?php } ?>

/* CONSTRUIMOS TABLA RAPHAEL */
$('#bbt tr td:first-child').each(function(){
	fecha = $(this).html();
	$('#data tfoot tr').append('<th>'+fecha+'</th>');
});
$('#bbt tr td:last-child').each(function(){
	fecha2 = $(this).html();
	$('#data tbody tr').append('<td>'+fecha2+'</td>');
});

arrayClients = [];
$('.Beneficiario,.Cliente').each(function(){
	beneficiario = $(this).parent().children('.Nombre').html();
	arrayClients.push([beneficiario,$(this).html()]);
	$(this).html(beneficiario);
})

