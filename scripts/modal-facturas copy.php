
$modalHeader = '<div class="modal fade fullmodal" id="factura'+valores+'"> <div class="modal-dialog"> <div class="modal-content">  <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">Factura</h4> </div> <div class="modal-body"> <div id="container" class="container">';

$modalFooter = '</div> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Cierra</button> </div> </div> </div> </div>';
$modalBody = '';
var titulos = [];
for (var elvalor in table) {
	titulos.push(table[elvalor][0]);
}

$modalBody += '<div class="factura container"><div id="facHeader"> <div id="logoF"> <img src="media/img/logoV.png" alt="" WIDTH="170"> </div> <div id="datosHeader"> <h5>Factura</h5> <h5>Ref.: FAC 10-16-1-13</h5> <p> Fecha de facturación: 11/06/2013<br> Fecha de vencimiento: 12/06/2013<br> Código de cliente: 16<br> Ref. presupuesto: PRE 15-9/713<br> Fecha de presupuesto: 13/05/2013<br> </p> </div> </div> <div class="secciones"> <div class="cuadro cIzq"> <h4>Datos emisor</h4> <h5>Bueninvento SL.</h5> <p> CIF: B98403801<br> Calle Pascual y Genís 10, 2ºA. 46002. Valencia<br> Teléfono: 690 708 181<br> bueninvento@bueninvento.es<br> </p> </div> <div class="cuadro"> <h4>Datos cliente</h4> <h5>We are traders SLU.</h5> <p> Dirección: Ptda L’empedrat s/n<br> 46850 - L’Olleria, Valencia<br> CIF: B98385065<br> </p> </div> </div> <div class="secciones"> <table cellspacing="0"> <tbody> <tr class="franja"> <th> 	Concepto </th> <th> 	P.U. </th> 	<th> 	Cant. </th> <th> 	Base imponible </th> </tr> <tr> <td> 	Concepto producto </td> <td> 	Precio euros </td> <td> 	Cantidad </td> <td> 	Base euros </td> </tr> <tr class="no-franja"> <td> </td> <td> 	Base imponible </td> <td> 	 </td> <td> 	Base euros </td> </tr> <tr class="no-franja"> <td> </td> <td> 	Total IVA 21% </td> <td> 	 </td> <td> 	IVA euros </td> </tr> <tr> <td> </td> <td class="franja"> 	Total </td> <td class="franja"> 	 </td> <td class="franja"> 	Total euros </td> </tr> </tbody> </tabl> </div> <div class="secciones"> <b>Pago mediante transferencia sobre la cuenta bancaria siguiente:</b> <table cellspacing="0" class="tLittle"> <tbody> <tr class="franja"> <th> 	Código banco </th> <th> 	Código sucursal </th> <th> 	Dígito control </th> <th> 	Número de cuenta </th> </tr> <tr class="no-franja"> <td> 	0049 </td> <td>  	0780 </td> <td> 	41 </td> <td> 	2611888775 </td> </tr> </tbody> </table> <p> Domicialización: C/ Pascual y genís, 10, 2º A. </p> <p> Código IBAN: ES47 0049 0780 4126 1188 8775 </p> <p> Código SWIFT: BSCH ES MM XXX </p> </div> </div>'; 

$i=0;
for (var subvalor in resultados[valores]) {
	
	$modalBody += '<p class="'+subvalor+'">'+titulos[$i]+': '+resultados[valores][subvalor]+'</p>';

$i++;
}
elModal += $modalHeader+$modalBody+$modalFooter;

