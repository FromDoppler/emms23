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
            window.location.href = getUrlWithParams('/ecommerce.php');
        }
    </script>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado">

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="./index.php"><img src="src/img/logos/logo-emms-ecommerce.png" alt="Emms Ecommerce 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="./registrado.php">home</a></li>
                    <li class="emms__header__nav__menu__dropdown"><a href="#" class="active">ecommerce</a>
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
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Fecommerce.php', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fecommerce.php&text=Vuelve%20el%20EMMS%20%C2%A1y%20con%20una%20nueva%20edici%C3%B3n!%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20la%20industria%20E-commerce.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20lugar%20ahora!%20', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fecommerce.php&title=Vuelve%20el%20EMMS%20%C2%A1y%20con%20una%20nueva%20edici%C3%B3n!%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20la%20industria%20E-commerce.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20lugar%20ahora!%20', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-form--registered">
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
                    <p>Estos son los <strong>ponentes</strong> que nos acompañarán en esta edición y las <strong>temáticas</strong> de sus charlas. ¡Presta atención! Seguimos sumando conferencias a la agenda y te avisaremos de esto y mucho más vía Email.</p>
                </div>
                <!-- List -->
                <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">


                    <?php require_once('./src/components/speakers.php') ?>


                    <!-- <li class="emms__calendar__list__item emms__calendar__list__item--special">
                        <div class="emms__calendar__list__item__card">
                            <div class="emms__calendar__list__item__card__speaker">
                                <div class="emms__calendar__list__item__card__speaker__image">
                                    <img src="src/img/example-speakers.png" alt="Speaker">
                                </div>
                            </div>
                            <div class="emms__calendar__list__item__card__description">
                                <h4>Mesa de debate</h4>
                                <p>Descripción</p>
                            </div>
                            <div class="emms__calendar__list__item__card__business">
                           <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                <a class="emms__calendar__list__item__card__btn-bio">Conoce los Speakers →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <ul>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                    </ul>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            </div>
                        </div>
                    </li> -->

                </ul>
                <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
                    <li class="emms__calendar__list__item">
                        <div class="emms__calendar__list__item__card">
                            <div class="emms__calendar__list__item__card__speaker">
                                <div class="emms__calendar__list__item__card__speaker__image">
                                    <img src="src/img/example-speaker.png" alt="Speaker">
                                </div>
                                <div class="emms__calendar__list__item__card__speaker__text">
                                    <h4>Nombre speaker</h4>
                                    <h5>Posición del speaker</h5>
                                    <ul>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="emms__calendar__list__item__card__description">
                                <p>Descripción</p>
                            </div>
                            <div class="emms__calendar__list__item__card__business">
                                <img src="src/img/example-speaker-company.png" alt="Logo">
                                <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4>Nombre speaker</h4>
                                    <p>Biografía</p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="emms__calendar__list__item">
                        <div class="emms__calendar__list__item__card">
                            <div class="emms__calendar__list__item__card__speaker">
                                <div class="emms__calendar__list__item__card__speaker__image">
                                    <img src="src/img/example-speaker.png" alt="Speaker">
                                </div>
                                <div class="emms__calendar__list__item__card__speaker__text">
                                    <h4>Nombre speaker</h4>
                                    <h5>Posición del speaker</h5>
                                    <ul>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="emms__calendar__list__item__card__description">
                                <p>Descripción</p>
                            </div>
                            <div class="emms__calendar__list__item__card__business">
                                <img src="src/img/example-speaker-company.png" alt="Logo">
                                <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4>Nombre speaker</h4>
                                    <p>Biografía</p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="emms__calendar__list__item">
                        <div class="emms__calendar__list__item__card">
                            <div class="emms__calendar__list__item__card__speaker">
                                <div class="emms__calendar__list__item__card__speaker__image">
                                    <img src="src/img/example-speaker.png" alt="Speaker">
                                </div>
                                <div class="emms__calendar__list__item__card__speaker__text">
                                    <h4>Nombre speaker</h4>
                                    <h5>Posición del speaker</h5>
                                    <ul>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                        <li><a href="" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="emms__calendar__list__item__card__description">
                                <p>Descripción</p>
                            </div>
                            <div class="emms__calendar__list__item__card__business">
                                <img src="src/img/example-speaker-company.png" alt="Logo">
                                <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4>Nombre speaker</h4>
                                    <p>Biografía</p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="emms__calendar__list__item emms__calendar__list__item--special">
                        <div class="emms__calendar__list__item__card">
                            <div class="emms__calendar__list__item__card__speaker">
                                <div class="emms__calendar__list__item__card__speaker__image">
                                    <img src="src/img/example-speakers.png" alt="Speaker">
                                </div>
                            </div>
                            <div class="emms__calendar__list__item__card__description">
                                <h4>Mesa de debate</h4>
                                <p>Descripción</p>
                            </div>
                            <div class="emms__calendar__list__item__card__business">
                                <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                                <a class="emms__calendar__list__item__card__btn-bio">Conoce los Speakers →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <ul>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                        <li>
                                            <p>Nombre del speaker <span>Puesto en la empresa</span></p>
                                        </li>
                                    </ul>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- End list -->
            </div>
        </section>


        <!-- Doppler Banner -->
        <?php include_once('././src/components/doppler-banner.php'); ?>


    </main>

    <!-- Footer -->
        <!-- Footer -->
        <footer class="emms__footer">
        <div class="emms__footer__event emms__fade-in">
            <p><strong>EMMS 2023</strong> - Un evento creado por <a href="https://www.fromdoppler.com/es/?utm_source=emmsecom&utm_campaign=et-interna-emmsecom-registrado-23" target="_blank"><img src="src/img/logos/logo-doppler--neg.svg" alt="Doppler"></a></p>
        </div>
        <div class="emms__footer__social emms__fade-in">
            <ul>
                <li><a href="https://www.instagram.com/fromdoppler/" target="_blank"><img src="src/img/icons/icono-instagram.svg" alt="Instagram"></a></li>
                <li><a href="https://www.facebook.com/DopplerEmailMarketing" target="_blank"><img src="src/img/icons/icono-facebook.svg" alt="Facebook"></a></li>
                <li><a href="https://www.youtube.com/user/FromDoppler" target="_blank"><img src="src/img/icons/icono-youtube.svg" alt="Youtube"></a>
                </li>
                <li><a href="https://www.linkedin.com/company/228261" target="_blank"><img src="src/img/icons/icono-linkedin.svg" alt="LinkedIn"></a></li>
                <li><a href="https://twitter.com/fromDoppler" target="_blank"><img src="src/img/icons/icono-twitter.svg" alt="Twitter"></a></li>
            </ul>
        </div>
        <div class="emms__footer__actions emms__fade-in">
            <a onclick="OneTrust.ToggleInfoDisplay()" id="ot-sdk-btn" class="ot-sdk-show-settings">Configuración de Cookies.</a>
            <a href="https://www.fromdoppler.com/es/legal/privacidad/" target="_blank">Políticas de privacidad y legales</a>
        </div>
    </footer>

    <script src="src/<?= VERSION ?>/flickity/flickity.pkgd.min.js"></script>
    <script src="src/<?= VERSION ?>/js/commonAnimations.js"></script>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>

</body>

</html>
