<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
?>
<script src='./src/<?= VERSION ?>/js/vendors/socket.io.min.js?version=<?= VERSION ?>'></script>
<script>
    const socket = io("wss://<?= URL_REFRESH ?>", {
        path: "/<?= PATH_REFRESH ?>/socket.io"
    });
    socket.on("state", (args) => {
        location.reload();
    });
</script>
<script type="module">
    import {
        getUrlWithParams
    } from './src/<?= VERSION ?>/js/common/index.js';
    import {
        userRegisteredInEvent,
        checkEncodeUrl
    } from './src/<?= VERSION ?>/js/user.js';
    checkEncodeUrl();
    if (!userRegisteredInEvent('ecommerce')) {
        window.location.href = getUrlWithParams('/ecommerce');
    }
</script>
<?php
$response = processPhaseToShow('ecommerce');
require_once($_SERVER['DOCUMENT_ROOT'] . "/stages/ecommerce/$response[phaseToShow]/ecommerce-registrado.php");
?>
