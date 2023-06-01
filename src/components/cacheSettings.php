<?php
require_once('././config.php');
require_once('./utils/DB.php');

$mem_var = new Memcached();
$mem_var->addServer(MEMCACHED_SERVER, 11211);
$settings_phase = $mem_var->get("settings_phase_ecommerce");

if (!$settings_phase)
{
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $settings_phase = $db->getCurrentPhase('ecommerce')[0];
    $db->close();
    $mem_var->set("settings_phase_ecommerce", $settings_phase, CACHE_TIME);
}
$isPre = (($settings_phase['event'] === "ecommerce") && ($settings_phase['pre'] === 1));
$isLive = (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) &&  ($settings_phase['transition'] === "live-on"));
$isDuring = (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1));
$isPost = (($settings_phase['event'] === "ecommerce") && ($settings_phase['post'] === 1));
