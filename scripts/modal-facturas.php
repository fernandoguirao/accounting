$estilos = '';

$modalHeader = '<div class="modal fade fullmodal" id="factura'+valores+'"> <div class="modal-dialog"> <div class="modal-content">  <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>  </div> <div class="modal-body"> <div id="container" class="container">';

$modalFooter = '</div> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Cierra</button> <a class="btn botonPDF btn-info" onClick="botonPDF(this);">PDF</a></div> </div> </div> </div>';
$modalBody = '';
var titulos = [];
for (var elvalor in table) {
	titulos.push(table[elvalor][0]);
}

$modalBody += '<div class="factura container fact"><div id="facHeader"> <div id="logoF"> <img src="media/img/logoV.png" alt="" WIDTH="170"> </div> <div id="datosHeader"> <h5><b color="#333">Factura</b><br>'; 

$i=0;
var $modalBody0 = '';
var $modalBody1 = '';
var $modalBody2 = '';
var $modalBody3 = '';
var $modalBody4 = '';
var $modalBody5 = '';

for (var subvalor in resultados[valores]) {
	if (subvalor==="'invoiceReference'"){
		$modalBody0 = '<b color="#333">Ref.: ' + resultados[valores][subvalor] + '</b><br>';
	}
	else if (subvalor==="'dateInvoice'"){
		$modalBody1 = 'Fecha de facturación: <span class="fechan" color="#333">' + resultados[valores][subvalor] + '</span><br>';
	}
	else if (subvalor==="'date'"){
		$modalBody2 = 'Fecha de vencimiento: <span class="fechan" color="#333">' + resultados[valores][subvalor] + '</span><br>';
	}
	else if (subvalor==="'recipient'" || subvalor==="'client'" ){
		$modalBody3 = 'Código de cliente: #' + resultados[valores][subvalor] + '<br>';
	}
	else if (subvalor==="'invoiceBudget'"){
		$modalBody4 = 'Ref. presupuesto: ' + resultados[valores][subvalor] + '<br>';
	}
	else if (subvalor==="'dateBudget'"){
		$modalBody5 = 'Fecha de presupuesto: ' + resultados[valores][subvalor] + '<br>';
	}
	else if (subvalor==="'concept'"){
		$modalBodyConcept = resultados[valores][subvalor];
	}
	else if (subvalor==="'amount'"){
		$modalBodyAmount = resultados[valores][subvalor];
	}
	else if (subvalor==="'taxes'"){
		$modalBodyTaxes = resultados[valores][subvalor];
	}
	else if (subvalor==="'invoiceConditions'"){
		$modalBodyConditions = resultados[valores][subvalor]+'<br>';
	} 
	else if (subvalor==="'full_name'"){
		$modalBodyNameClient = resultados[valores][subvalor];
	} 
	else if (subvalor==="'address'"){
		$modalBodyAddressClient = resultados[valores][subvalor];
	} 
	else if (subvalor==="'DNI'"){
		$modalBodyDNIClient = resultados[valores][subvalor];
	}
/* 	$modalBody += '<p class="'+subvalor+'" color="#333">'+titulos[$i]+': '+resultados[valores][subvalor]+'</p>'; */
$i++;
}

$modalBody += $modalBody0+$modalBody1+$modalBody2+$modalBody3+$modalBody4+$modalBody5;

$modalBody += '</h5> </div> </div> <div class="secciones"> <div class="cuadro cIzq"> <h5 color="#333">DATOS EMISOR</h5> <p color="#333"><b>Bueninvento SL.</b><br>CIF: B98403801<br>C/ Pascual y Genís 10, 2ºA<br>46002. Valencia<br>Teléfono: 690 708 181<br>bueninvento@bueninvento.es<br> </p> </div> <div class="cuadro cDer"> <h5 color="#333">DATOS CLIENTE</h5> <p color="#333"><b>'+$modalBodyNameClient+'</b><br>'+$modalBodyDNIClient+'<br>Dirección: '+$modalBodyAddressClient+'<br> </p> </div> </div> <div id="restoPDF"><div class="secciones"> <table cellspacing="0" cellpadding="12"> <tbody> <tr class="franja" color="#333"> <th>Concepto </th> <th>P.U. </th> 	<th>Cant. </th> <th>Base imponible </th> </tr> <tr> <td>'+$modalBodyConcept+'</td><td>	'+$modalBodyAmount+'</td><td>1 </td> <td>'+$modalBodyAmount+'</td> </tr> <tr class="no-franja"> <td> </td> <td>Base imponible </td> <td> 	 </td> <td>'+$modalBodyAmount+'</td> </tr> <tr class="no-franja"> <td> </td> <td>Total IVA 21%</td><td></td><td>'+$modalBodyTaxes+'</td> </tr><tr> <td></td><td class="franja">Total</td><td class="franja"></td><td class="franja">'+	(parseInt($modalBodyTaxes)+parseInt($modalBodyAmount))+ '</td> </tr> </tbody> </table> </div> <div class="secciones"><h5>CONDICIONES DE PAGO</h5><p>'+$modalBodyConditions+'</p><h5>Pago mediante transferencia sobre la cuenta bancaria siguiente:</h5> <br><table cellspacing="0" cellpadding="7" class="tLittle"> <tbody> <tr class="franja"> <th>Código banco </th> <th>Código sucursal </th> <th>Dígito control </th> <th>Número de cuenta </th> </tr> <tr class="no-franja"> <td>0049 </td> <td>0780 </td> <td>41 </td> <td>2611888775 </td> </tr> </tbody> </table> <p>Domicialización: C/ Pascual y genís, 10, 2º A.<br>Código IBAN: ES47 0049 0780 4126 1188 8775<br>Código SWIFT: BSCH ES MM XXX </p> </div></div> </div>';


elModal += $estilos+$modalHeader+$modalBody+$modalFooter;

