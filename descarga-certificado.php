<?php
require_once('././src/components/cacheSettings.php');
require_once('././config.php');
require_once('./utils/DB.php');
// If the user accesses this page without the email parameter or workshop, they will automatically be redirected to the home
if ((!isset($_GET['email']) || !isset($_GET['workshop']))) {
    header('Location: ' . 'index');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-home.php'); ?>
    <?php include_once('././src/components/head.php'); ?>

    <script src='./src/<?= VERSION ?>/js/vendors/socket.io.min.js?version=<?= VERSION ?>'></script>
    <script>
        const socket = io("wss://<?= URL_REFRESH ?>", {
            path: "/<?= PATH_REFRESH ?>/socket.io"
        });
        socket.on("state", (args) => {
            location.reload();
        });
    </script>
</head>

<body class="emms__previous-editions">
    <div class="loader-page--new" id="spinner">
        <img src="src/img/logoemms-nobg.png" class="loader-goemms" alt="Loader goemms">
    </div>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="/"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/">home</a></li>
                    <li><a href="./ecommerce">e-commerce</a></li>
                    <li><a href="./digital-trends">digital trends</a></li>
                    <li><a href="/sponsors">biblioteca de recursos</a></li>
                    <li><a href="#">ediciones anteriores</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Findex.php', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Findex.php&text=Llega%20una%20nueva%20edici%C3%B3n%20del%20EMMS.%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20Marketing%20Digital.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20plaza!', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Findex.php&title=Llega%20una%20nueva%20edici%C3%B3n%20del%20EMMS.%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20Marketing%20Digital.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20plaza!', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__certificate-download">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">¡Estás a un paso de descargar tu Certificado de Asistencia!</h1>
                <p class="emms__fade-in">Ingresa tu nombre y apellido para descargarlo ahora 🙂</p>
                <form id="certificateForm">
                    <input type="text" placeholder="Nombre y apellido" name="fullname" class="emms__fade-in">
                    <span class="certificateError">¡Ouch! Debes ingresar al menos 2 caracteres.</span>
                    <a class="emms__cta emms__fade-in" type="button" id="certificateWorkshop"><span class="button__text">QUIERO DESCARGARLO</span></a>
                </form>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/certificateModal.js"></script>
    <script src="src/<?= VERSION ?>/js/certificate/certificateWorkshop.js" type="module"></script>


</body>

</html>