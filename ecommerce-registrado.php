<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');

$response = processPhaseToShow('ecommerce');
require_once($_SERVER['DOCUMENT_ROOT'] . "/stages/ecommerce/$response[phaseToShow]/ecommerce-registrado.php");
?>
