<?php

include "scripts/conection_open.php";

include 'templates/persistent/header.php';

include 'scripts/action.php';
include 'scripts/delete.php';
include 'scripts/update.php';

include 'templates/session/login.php';
include 'scripts/session.php';

include 'templates/persistent/topBar.php';

include 'scripts/foreignKey.php';
include_once 'scripts/datavars.php';

include 'templates/persistent/body-gen.php';

include 'templates/persistent/footer.php';

include "scripts/conection_close.php";



?>