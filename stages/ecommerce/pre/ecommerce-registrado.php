<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado">
    <?php include_once('././src/components/gtm.php'); ?>

    <!-- Hellobar -->
    <div class="emms__hellobar">
        <div class="emms__hellobar__container emms__fade-in">
            <p><strong>EMMS E-commerce:</strong> ¡disfruta de un día más de aprendizaje! <strong>16 y 17 de mayo</strong></p>
        </div>
    </div>

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
                    <li><a href="/sponsors-registrado">contenido exclusivo</a></li>
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
        <section class="emms__hero-registration--registered">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">¡Ya eres parte del EMMS E-commerce!</h1>
                <p class="emms__fade-in">Te damos la bienvenida a este gran evento. <a href="#agenda">Revisa la Agenda</a> que hemos planeado para ti y prepárate para vivir el primer EMMS para Tiendas Online. ¡Gracias por sumarte! :)</p>
            </div>
        </section>

        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Conoce a los Speakers del EMMS E-commerce 2023</h2>
                    <p>Estos son los <strong>ponentes</strong> que nos acompañarán en esta edición y las <strong>temáticas</strong> de sus charlas. </p>
                </div>
                <!-- Speakers -->
                <?php include('./src/components/speakers.php') ?>
                <!-- End list -->
            </div>
            <div class="emms__background-c"></div>
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
    <script src="src/<?= VERSION ?>/js/date.js"></script>

</body>

</html>
