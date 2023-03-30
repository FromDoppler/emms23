<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
    <script type="module">
        import {
            isUserLogged,
            getUrlWithParams
        } from './src/<?= VERSION ?>/js/common/index.js';

        if (!isUserLogged()) {
            window.location.href = getUrlWithParams('/ecommerce');
        }
    </script>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-ecommerce.png" alt="Emms Ecommerce 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/registrado">home</a></li>
                    <li class="emms__header__nav__menu__dropdown"><a href="#" class="active">e-commerce</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">AGENDA</a></li>
                            <li><a href="#aprende-con-doppler">APRENDE CON DOPPLER</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Fecommerce', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fecommerce&text=Vuelve%20el%20EMMS%20%C2%A1y%20con%20una%20nueva%20edici%C3%B3n!%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20la%20industria%20E-commerce.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20lugar%20ahora!%20', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fecommerce&title=Vuelve%20el%20EMMS%20%C2%A1y%20con%20una%20nueva%20edici%C3%B3n!%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20la%20industria%20E-commerce.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20lugar%20ahora!%20', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-during">
            <div class="emms__container--lg">
                <div class="emms__hero-during__video">
                    <h1>EN VIVO</h1>
                    <div class="emms__cropper-cont-16-9">
                        <div class="emms__cropper-cont ">
                            <div class="emms__cropper-cont-interno">
                                <iframe src="https://www.youtube.com/embed/yjg-HjGfK8A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <small>Recuerda activar el sonido 🔉</small>
                    <p class="emms__hero-during__video__certificate">Descarga <a data-target="certificateModal" data-toggle="emms__certificate-modal">aquí</a> tu Certificado de Asistencia y compártelo en Redes Sociales usando el Hashtag #EMMSECOMMERCE :)</p>
                </div>
                <div class="emms__hero-during__chat">
                    <iframe src="https://www.youtube.com/live_chat?v=yjg-HjGfK8A&embed_domain=goemms.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </section>

        <!-- Certificate modal -->
        <div id="certificateModal" class="emms__certificate-modal">
            <div class="emms__certificate-modal__window">
                <h3>Estás a un paso de generar tu Certificado</h3>
                <p>Ingresa tu Nombre y Apellido y descárgalo ahora</p>
                <input type="text" placeholder="Ingresa aquí tu Nombre y Apellido">
                <span>Debes ingresar tu Nombre y Apellido</span>
                <a href="" class="emms__cta">DESCARGAR</a>
                <button class="emms__certificate-modal__window__close" data-dismiss="emms__certificate-modal"></button>
            </div>
        </div>

        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Conoce a los Speakers del EMMS E-commerce 2023</h2>
                    <p>Estos son los <strong>ponentes</strong> que nos acompañarán en esta edición y las <strong>temáticas</strong> de sus charlas. </p>
                </div>
                <!-- List -->
                <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
                    <?php include('./src/components/speakers.php') ?>
                </ul>
                <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
                    <?php include('./src/components/speakers.php') ?>
                </ul>
                <!-- End list -->
                <div class="emms__calendar__bottom emms__fade-in">
                    <p>¡Presta atención! <strong>Seguimos sumando conferencias a la agenda</strong>. Te avisaremos de esto y mucho más vía Email.</p>
                </div>
            </div>
        </section>


        <!-- Separator -->
        <div class="emms__separator"></div>


        <!-- Premium content -->
        <section class="emms__premium-content">
            <div class="emms__container--lg">
                <div class="emms__premium-content__text emms__fade-in">
                    <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                    <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu Tienda Online.</p>
                    <a href="./sponsors-registrado" class="emms__cta emms__fade-in">DESCÚBRELO AQUÍ</a>
                </div>
                <div class="emms__premium-content__picture emms__fade-in">
                    <img src="src/img/download--locked.png" alt="Contenido Premium">
                </div>
            </div>
        </section>


        <!-- Doppler Banner -->
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/certificateModal.js"></script>

</body>

</html>
