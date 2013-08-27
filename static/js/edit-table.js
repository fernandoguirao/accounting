
/*

Cuando hago click en un td de la tabla
    que no sea el primero ni el último de cada fila:
        guardar su valor,
        sustituir su valor por un formulario
            con un primer input text con placeholder el valor guardado
            con un botón de guardar y otro de cancelar
                el botón de guardar lanza la consulta php
*/


var $valorForm1;
var $valorForm2;
var $valorID;
var $valorTipo;
var urlarchivo = "";
$('.edit-table td').not(':first,:last,.no-edit').each(function(){
    $(this).click(function(){
        if ($(this).hasClass('no-click')) {
        } else if ($(this).hasClass('casi-no-click')) {
            $(this).removeClass('casi-no-click');
        
        /* SUBIR UNA FACTURA A DROPBOX */
        } else if ($(this).hasClass('fac-noClick')){
        	$(this).removeClass('fac-noClick');
        	$(this).addClass('Factura');
        } else if ($(this).hasClass('Factura')) {
					
					aqui = $(this);
					
        	if (urlarchivo.length<1){
        		$(this).html('<div class="btn btn-info" onClick="Dropbox.choose(options);" id="db-chooser">Sube una factura</div>');
        	// add an event listener to a Chooser button
/*
document.getElementById("db-chooser").addEventListener("DbxChooserSuccess",
function(e) {
	console.log(e.files[0].link);
	dropboxArchivo = e.files[0].link;
}, false);
*/
        function finDropbox(url){
        		$valorID = aqui.parent().children(':first').html();
            $valorForm1 = urlarchivo;
            posicion = aqui.index();
            $valorTipo = Object.keys( table )[posicion];
        /* ENVIAMOS EL DATO */
				aqui.html("<form action='' method='POST'><input type='hidden' value='"+$valorID+"' name='idUpdate'><input type='hidden' value='"+$valorTipo+"' name='typeUpdate'><div class=''><div class='input-group'><input type='text' value='"+$valorForm1+"' name='valueUpdate' class='form-control input-sm'><div class='input-group-btn'><button type='submit' class='btn btn-success btn-sm' onClick='guardarValorD(this,"+urlarchivo+")'><span class='glyphicon glyphicon-ok'></span></button><a href='#' class='btn btn-cancelar btn-sm btn-danger' onClick='borrarValor(this);'><span class='glyphicon glyphicon-remove'></span></a></div></div></div></form>");

        
	        /* aqui.html('<a href="'+url+'" class="btn btn-success btn-xs" target="_blank">Descarga</a>'); */
	        urlarchivo="";
	        aqui.removeClass('Factura');
	        aqui.addClass('fac-noClick');
        }
options = {

            // Required. Called when a user selects an item in the Chooser.
            success: function(files) {
                urlarchivo = files[0].link;
                console.log(urlarchivo);
                finDropbox(urlarchivo);
            },

            // Optional. Called when the user closes the dialog without selecting a file
            // and does not include any parameters.
            cancel: function() {

            },

            // Optional. "preview" (default) is a preview link to the document for sharing,
            // "direct" is an expiring link to download the contents of the file. For more
            // information about link types, see Link types below.
            linkType: "preview",

            // Optional. A value of false (default) limits selection to a single file, while
            // true enables multiple file selection.
            multiselect: false
            
        };
} else {
	
}
                } 
        /* FIN DE SUBIR FACTURA */
        else {
            $('.no-click').removeClass('no-click').html($valorForm1);
            $valorID = $(this).parent().children(':first').html();
            $valorForm1 = $(this).html();
            posicion = $(this).index();
            $valorTipo = Object.keys( table )[posicion];
            if ($(this).hasClass('Beneficiario')) {
	            $valorForm1b = $valorForm1;
	            
	            for (var $k = 0;$k<arrayClients.length;$k++) {
		            if (arrayClients[$k][0] == $valorForm1b){
			            $valorForm1 = arrayClients[$k][1];
		            }
		            
	            }
	            
            } else if ($(this).hasClass('Cliente')) {
	            $valorForm1b = $valorForm1;
	            
	            for (var $k = 0;$k<arrayClients.length;$k++) {
		            if (arrayClients[$k][0] == $valorForm1b){
			            $valorForm1 = arrayClients[$k][1];
		            }
		            
	            }
	            
            }
            $(this).html("<form action='' method='POST'><input type='hidden' value='"+$valorID+"' name='idUpdate'><input type='hidden' value='"+$valorTipo+"' name='typeUpdate'><div class=''><div class='input-group'><input type='text' value='"+$valorForm1+"' name='valueUpdate' class='form-control input-sm'><div class='input-group-btn'><button type='submit' class='btn btn-success btn-sm' onClick='guardarValor(this)'><span class='glyphicon glyphicon-ok'></span></button><a href='#' class='btn btn-cancelar btn-sm btn-danger' onClick='borrarValor(this);'><span class='glyphicon glyphicon-remove'></span></a></div></div></div></form>");
            $(this).addClass('no-click');
            if ($(this).hasClass('IVA')) {
            	var cantidad = $(this).prev().html();
	            $(this).children().children().children().children().val((cantidad*21)/100);
            } 
        }
})
});

function guardarValor(objeto) {
    $valorForm2 = $(objeto).parent().find('.form-control').val();
    $(objeto).parent().parent().removeClass('no-click').addClass('casi-no-click');
    $(objeto).parent().parent().html($valorForm2);
}

function guardarValorD(objeto,urlarchivo) {
    $valorForm2 = $(objeto).parent().parent().find('.form-control').val();
    $(objeto).parent().parent().html(urlarchivo);
    
    
}

function borrarValor(objeto) {
		$(objeto).parent().parent().parent().parent().parent().removeClass('no-click').addClass('casi-no-click');
    $(objeto).parent().parent().parent().parent().parent().html($valorForm1);
    if ($(objeto).parent().parent().parent().parent().parent().parent().hasClass('Beneficiario')) {
    	$(objeto).parent().parent().parent().parent().parent().parent().html($valorForm1b);
    } else if ($(objeto).parent().parent().parent().parent().parent().parent().hasClass('Cliente')) {
    	$(objeto).parent().parent().parent().parent().parent().parent().html($valorForm1b);
    }
}

