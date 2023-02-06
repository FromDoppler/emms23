<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/ErrorLog.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');



function processError($functionName, $descriptionError, $data)
{
    ErrorLog::log($functionName, $descriptionError, $data);
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $date = date("Y-m-d h:i:s A");
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $db->insertLogErrors($date, $functionName, addslashes($descriptionError), addslashes(json_encode($data)));
    $db->close();
}

function processPhaseToShow($ip)
{
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $phases = $db->getCurrentPhase()[0];
    $simulator = $db->getSimulator()[0];
    $transmission = $db->getSettingsTransmission()[0];
    $enabled = array_shift($simulator);
    $phaseToShow =  ($enabled && in_array($ip, ALLOW_IPS)) ? array_search(1, $simulator) : array_search(1, $phases);
    $duringDaySistem = ($enabled && in_array($ip, ALLOW_IPS)) ? $db->getSimulatorDuringDay()[0] : $db->getDuringDay()[0];
    return array('phaseToShow' => $phaseToShow, 'simulated' => ($enabled && in_array($ip, ALLOW_IPS)), 'day' => $duringDaySistem['day'], 'live' => $duringDaySistem['live'], 'problemsTransmission' => $transmission['problems'], 'isTransmissionYoutube' => $transmission['youtube']);
}
