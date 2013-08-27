<!--
DOCUMENTACIÓN
Valores para los atributos:
nombreenmysql: ["Nombre bien descrito","tipo de campo (ver más abajo)",["array de subvalores (ver más abajo)"]]

TIPOS DE CAMPOS
hidden: oculto,
date: date-picker,
select: un select con los valores especificados en el array a continuación
text: campo de texto normal
foreign: un foreign key con el siguiente array [<?php foreignKey('tabla relacionada','id','short_name','type','proveedor');?>]
semi-hidden: oculto en tabla pero se muestra en modal
-->

<script type="text/javascript">

<?php


if ($tabla == 'expenses') {
    
    $objetivo = "gasto";
?>
	var table = {
		id:["#","hidden"],
		date:["Fecha de cobro","date"],
/* 		type:["Tipo de gasto","select",["Bueninvento","Personales"]], */
		subtype:["Tipo","select",["Proyectos","Compras"]],
		concept:["Concepto","text"],
		recipient:["Beneficiario ","foreign",[<?php foreignKey('clients_and_suppliers','id','short_name','type','proveedor');?>]],
		amount:["Cantidad ","text"],
		taxes:["IVA ","text"],
		status:["Estado","select",["Pagado","No pagado"]],
		invoiceReference:["Referencia ","hidden"],
		invoiceConditions:["Condiciones ","semi-hidden"],
		invoiceBudget:["Presupuesto ","semi-hidden"],
		invoiceURL: ["Factura ","text"],
		short_name:["Nombre ","semi-hidden"],
		full_name:["Nombre2 ","semi-hidden"],
		address:["Dirección ","semi-hidden"],
		phone:["Teléfono ","semi-hidden"],
		DNI:["DNI-CIF ","semi-hidden"],
		accountBnk:["Banco ","semi-hidden"]
	};
<?php
} else if ($tabla == 'incoming') {
    
    $objetivo = "ingreso";
    
?>
	var table = {
		id:["#","hidden"],
		date:["Fecha de cobro","date"],
/* 		type:["Tipo de gasto","select",["Bueninvento","Personales"]], */
		subtype:["Tipo","select",["Proyectos","Compras"]],
		concept:["Concepto","text"],
		payer:["Cliente ","foreign", [<?php foreignKey('clients_and_suppliers','id','short_name','type','cliente');?>]],
		amount:["Cantidad ","text"],
		taxes:["IVA ","text"],
		status:["Estado","select",["Pagado","No pagado"]],
		invoiceReference:["Referencia ","hidden"],
		invoiceConditions:["Condiciones ","semi-hidden"],
		invoiceBudget:["Presupuesto ","semi-hidden"],
		short_name:["Nombre ","semi-hidden"],
		full_name:["Nombre2 ","semi-hidden"],
		address:["Dirección ","semi-hidden"],
		phone:["Teléfono ","semi-hidden"],
		DNI:["DNI-CIF ","semi-hidden"],
		accountBnk:["Banco ","semi-hidden"]
	};
<?php	
} else if ($tabla == 'clients_and_suppliers') {
    
    $objetivo = "cliente o proveedor";
    
?>
	var table = {
		id:["#","hidden"],
		date:["Fecha de contacto","date"],
    short_name:["Nombre (corto)","text"],
    full_name:["Nombre completo","text"],
		type:["Tipo","select",["Cliente","Proveedor"]],
		subtype:["Subtipo","select",["Programador","Diseñador/ilustrador","Otros"]],
		DNI:["DNI/CIF","text"],
    phone:["Teléfono","text"],
		address:["Dirección","text"],
		accountBnk:["Cuenta ","text"]
	};
<?php } else { ?>
        var table = {};
    }
    <?php
}
?>
</script>