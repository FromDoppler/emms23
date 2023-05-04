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
        checkEncodeUrl
    } from './src/<?= VERSION ?>/js/user.js';
    checkEncodeUrl();
    if (userRegisteredInEvent('digital-trends')) {
        window.location.href = getUrlWithParams('/digital-trends-registrado');
    }
</script>
<?php
$response = processPhaseToShow('digital-trends');
require_once($_SERVER['DOCUMENT_ROOT'] . "/stages/digital-trends/$response[phaseToShow]/digital-trends.php");
?>
