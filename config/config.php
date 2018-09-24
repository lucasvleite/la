<?php

//CONFIGURAÇÕES DE HORÁRIO DE BRASÍLIA
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

require_once('settings.config.php');          // Define db configuration arrays here
require_once('DBConnection.php');             // Include this file

$database = new DBConnection($dbconfig);

include("path.php");

?>