<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');

$response = processPhaseToShow('digital-trends');
require_once($_SERVER['DOCUMENT_ROOT'] . "/stages/digital-trends/$response[phaseToShow]/digital-trends.php");
?>
