    <div class="navbar bs-docs-nav">
		<div class="container">
		<div class="navbar-header">

		<?php if (isset($_SESSION["usuario"])) { ?>
		<a href="/" class="navbar-brand">Bueninvento CRM</a>
		<?php } else { ?>
		<a href="/" class="navbar-brand">Bueninvento CRM</a>
		<?php } ?> 
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          </div>

			<div class="navbar-collapse collapse bs-navbar-collapse">
				<ul class="nav navbar-nav pull-left">
					<li <?php if ($tabla ==='expenses') { ?>class='active'<? } ?>>
						<a href="index.php" class="btn">Mis gastos</a>
					</li>
					<li <?php if ($tabla ==='incoming') { ?>class='active'<? } ?>>
						<a href="ingresos.php" class="btn">Mis ingresos</a>
					</li>
					<li <?php if ($tabla ==='clients_and_suppliers') { ?>class='active'<? } ?>>
						<a href="crm.php" class="btn">Clientes y proveedores</a>
					</li>
					<li <?php if ($tabla ==='balance') { ?>class='active'<? } ?>>
						<a href="balance.php" class="btn">Balance</a>
					</li>
				</ul>
                <ul class="nav navbar-nav navbar-collapse collapse bs-navbar-collapse pull-right cerrarusuario">
    		    <?php if (isset($_SESSION["usuario"])) { ?>
                    <li>
                        
                        <a href class="btn dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION["usuario"]; ?> <span class="caret"></span>
                        </a>
                    
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?logout=true" title="Cerrar sesión">Cerrar sesión</a>
                            </li>
                        </ul>
                        
                    </li>
                <?php } else { ?>
                    <?php /*
                    <li>
						<a href="registro.php" class="btn btn-lg">Registro de usuario</a>
					</li>
					<li>
						<a href="#modalLogin" data-toggle="modal" class="btn btn-lg">Inicia sesión</a>
					</li>
                    */
                    ?>
				<?php } ?>
                </ul>
                
			</div> 
		</div>
	</div>
	
	<br><br>