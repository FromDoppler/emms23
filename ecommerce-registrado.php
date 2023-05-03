<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
?>
<script type="module">
    import {
        getUrlWithParams
    } from './src/<?= VERSION ?>/js/common/index.js';
    import {
        userRegisteredInEvent,
    } from './src/<?= VERSION ?>/js/user.js';
    if (!userRegisteredInEvent('ecommerce')) {
        window.location.href = getUrlWithParams('/ecommerce');
    }
</script>
<?php
$response = processPhaseToShow('ecommerce');
require_once($_SERVER['DOCUMENT_ROOT'] . "/stages/ecommerce/$response[phaseToShow]/ecommerce-registrado.php");
?>
