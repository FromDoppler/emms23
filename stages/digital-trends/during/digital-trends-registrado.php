<?php
require_once('././src/components/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-digitaltrends.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
    <script type="module">
        import {
            hiddenOrShowUserUI
        } from './src/<?= VERSION ?>/js/user.js';
        hiddenOrShowUserUI('ecommerce');
    </script>
</head>

<body class="emms__digitaltrends emms__digitaltrends-logueado">
    <?php include_once('././src/components/gtm.php'); ?>

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-digitaltrends.png" alt="Digital Trends 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/">home</a></li>
                    <li><a href="/ecommerce">e-commerce</a></li>
                    <li class="emms__header__nav__menu__dropdown">
                        <a href="#" class="active">digital trends</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">agenda</a></li>
                            <li><a href="#entradas">entradas</a></li>
                        </ul>
                    </li>
                    <li><a href="/sponsors-registrado">biblioteca de recursos</a></li>
                    <li><a href="/ediciones-anteriores-registrado">ediciones anteriores</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Fdigital-trends', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&text=EMMS%20Digital%20Trends%202023%3A%20El%20mayor%20evento%20de%20Marketing%20Digital.%20Ya%20comenz%C3%B3%20una%20nueva%20edici%C3%B3n%20del%20evento%20m%C3%A1s%20esperado%20por%20la%20comunidad%20del%20Marketing.%20Descubre%20las%20%C3%BAltimas%20tendencias%20y%20las%20estrategias%20que%20implementan%20los%20l%C3%ADderes%20del%20mundo%20para%20hacer%20crecer%20sus%20negocios.%20Gratis%20y%20online.%20%C2%A1Reserva%20tu%20cupo%20ahora!', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&title=EMMS%20Digital%20Trends%202023%3A%20El%20mayor%20evento%20de%20Marketing%20Digital.%20Ya%20comenz%C3%B3%20una%20nueva%20edici%C3%B3n%20del%20evento%20m%C3%A1s%20esperado%20por%20la%20comunidad%20del%20Marketing.%20Descubre%20las%20%C3%BAltimas%20tendencias%20y%20las%20estrategias%20que%20implementan%20los%20l%C3%ADderes%20del%20mundo%20para%20hacer%20crecer%20sus%20negocios.%20Gratis%20y%20online.%20%C2%A1Reserva%20tu%20cupo%20ahora!', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-conference emms__hero-conference--chat">
            <div class="emms__container--lg">
                <?php if (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "youtube")) : ?>
                    <h1 class="emms__fade-in">EN VIVO</h1>
                    <div class="emms__hero-conference__video emms__fade-in">
                        <div class="emms__cropper-cont-16-9">
                            <div class="emms__cropper-cont ">
                                <div class="emms__cropper-cont-interno">
                                    <iframe src="https://www.youtube.com/embed/<?= $duringDaysArray[$dayDuring]['youtube'] ?>?rel=0&autoplay=1&mute=1&enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <small>Recuerda activar el sonido 🔊</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__fade-in emms__hero-conference__video--chat">
                        <iframe src="https://www.youtube.com/live_chat?v=<?= $duringDaysArray[$dayDuring]['youtube'] ?>&embed_domain=<?= $_SERVER['HTTP_HOST'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "twitch")) : ?>
                    <h1 class="emms__fade-in">EN VIVO</h1>
                    <div class="emms__hero-conference__video emms__fade-in">
                        <div class="emms__cropper-cont-16-9">
                            <div class="emms__cropper-cont ">
                                <div class="emms__cropper-cont-interno">
                                    <iframe src="https://player.twitch.tv/?channel=<?= $duringDaysArray[$dayDuring]['twitch'] ?>&parent=<?= $_SERVER['HTTP_HOST'] ?>"></iframe>
                                </div>
                            </div>
                        </div>
                        <small>Recuerda activar el sonido 🔊</small>
                    </div>
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "twitch-migrate")) : ?>
                    <img src="src/img/banner-migrate-twitch-DT.png" alt="Se migró a Twitch" class="banner">
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "technical-problems")) : ?>
                    <img src="src/img/banner-technical-error-DT.png" alt="Errores técnicos" class="banner">
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['transition'] === "live-off") && ($dayDuring === 1)) : ?>
                    <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in">
                        <h2>¡Eso fue todo por hoy! <br>Mañana volvemos con el #EMMS2023 :)</h2>
                        <small>Prepárate para más conferencias, networking y workshops en la siguiente jornada del EMMS Digital Trends. <br><br>Recuerda que comenzamos a las 10:30hs Arg</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in">
                        <p>¿Quieres disfrutar al máximo de otra jornada increíble? Ingresa <a href="#entradas">aquí</a> y reserva tu Entrada VIP para acceder al Networking y más de 15 Workshops prácticos. <br><br>¡Aún estás a tiempo de sumarte!</p>
                        <a class="emms__cta" href="#entradas">COMPRA TU ENTRADA</a>
                    </div>
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['transition'] === "live-off") && ($dayDuring === 2)) : ?>
                    <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in">
                        <h2>¡Eso fue todo por hoy! <br>Mañana volvemos con el #EMMS2023 :)</h2>
                        <small>Prepárate para más conferencias, networking y workshops en la siguiente jornada del EMMS Digital Trends. <br><br>Recuerda que comenzamos a las 10:30hs Arg</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in">
                        <p>¿Quieres disfrutar al máximo de otra jornada increíble? Ingresa <a href="#entradas">aquí</a> y reserva tu Entrada VIP para acceder al Networking y más de 15 Workshops prácticos. <br><br>¡Aún estás a tiempo de sumarte!</p>
                        <a class="emms__cta" href="#entradas">COMPRA TU ENTRADA</a>
                    </div>
                <?php elseif (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['transition'] === "live-off") && ($dayDuring === 3)) : ?>
                    <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in">
                        <h2>¡Eso fue todo por hoy! <br>Mañana volvemos con el #EMMS2023 :)</h2>
                        <small>Prepárate para más conferencias, networking y workshops en la siguiente jornada del EMMS Digital Trends. <br><br>Recuerda que comenzamos a las 10:30hs Arg</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in">
                        <p>¿Quieres disfrutar al máximo de otra jornada increíble? Ingresa <a href="#entradas">aquí</a> y reserva tu Entrada VIP para acceder al Networking y más de 15 Workshops prácticos. <br><br>¡Aún estás a tiempo de sumarte!</p>
                        <a class="emms__cta" href="#entradas">COMPRA TU ENTRADA</a>
                    </div>
                <?php endif; ?>
                <p class="emms__hero-conference__certificate emms__fade-in">Descarga <a data-target="certificateModal" data-toggle="emms__certificate-modal">aquí</a> tu Certificado de Asistencia y compártelo en Redes Sociales utilizando el Hashtag #EMMS2023</p>
            </div>
        </section>

        <!-- Certificate modal -->
        <div id="certificateModal" class="emms__certificate-modal">
            <div class="emms__certificate-modal__window">
                <h3>¡Estás a un paso de descargar tu Certificado de Asistencia!</h3>
                <p>Ingresa tu nombre y apellido para descargarlo ahora 🙂</p>
                <form id="certificateForm">
                    <input type="text" placeholder="Nombre y apellido" name="fullname">
                    <span class="certificateError">¡Ouch! Debes ingresar al menos 2 caracteres.</span>
                    <a class="emms__cta" type="button" id="certificateDT"><span class="button__text">QUIERO DESCARGARLO</span></a>
                    <button class="emms__certificate-modal__window__close" data-dismiss="emms__certificate-modal"></button>
                </form>
            </div>
        </div>


        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Agenda EMMS Digital Trends 2023</h2>
                    <p>¡Seguiremos confirmando speakers muy pronto!</p>
                </div>
            </div>
            <!-- Speakers -->
            <?php include('./src/components/speakers.php') ?>
            <!-- End list -->
            <div class="emms__container--lg">
                <div class="emms__calendar__bottom emms__fade-in">
                    <a href="#entradas" class="emms__cta">ACCEDE A TU ENTRADA VIP</a>
                </div>
            </div>
            <div id="entradas"></div>
        </section>


        <!-- Prices Plans -->
        <div class="emms__plans emms__bg-w">
            <div class="emms__container--lg">
                <div class="emms__plans__title emms__fade-in">
                    <h2>Entradas</h2>
                </div>
                <div class="emms__plans__benefits--dk emms__fade-in">
                    <ul>
                        <h3>Beneficios</h3>
                        <li>
                            <p>Acceso a todas las <a href="#agenda">conferencias</a></p>
                        </li>
                        <li>Volver a ver las conferencias todas las veces que quieras</li>
                        <li>Participación en los sorteos</li>
                        <li>Descuentos en herramientas y cursos</li>
                        <li>Certificado de participación a las conferencias</li>
                        <li>
                            <p>Acceso ilimitado a todos los <a href="#agenda">Workshops prácticos</a></p>
                        </li>
                        <li>Certificado de asistencia a Workshops</li>
                        <li>Acceso a licencias y descuentos en herramientas para tu estrategia digital</li>
                        <li>Networking con participantes y speakers</li>
                    </ul>
                </div>
                <div class="emms__plans__cards-container emms__fade-in">
                    <div class="emms__plans__card dk">
                        <h3>Asistente Free</h3>
                        <div class="emms__plans__card__inside">
                            <div class="emms__plans__card__inside__top">
                                <div class="emms__plans__card__inside__top--container">
                                    <h4>Gratis</h4>
                                    <a class="dtCursorPointer eventHiddenElements inactive"><span class="button__text">Accede</span></a>
                                    <a class="dtCursorPointer eventShowElements inactive"><span class="button__text">Accede</span></a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside__list">
                                <ul class="emms__collapse__list close">
                                    <h4>Beneficios</h4>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las <a href="#agenda">conferencias</a></p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Volver a ver las conferencias todas las veces que quieras</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Participación en los sorteos</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Descuentos en herramientas y cursos</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Certificado de participación a las conferencias</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Acceso ilimitado a todos los <a href="#agenda">Workshops prácticos</a></p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Certificado de asistencia a Workshops</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Acceso a licencias y descuentos en herramientas para tu estrategia digital</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Networking con participantes y speakers</p>
                                    </li>
                                    <button class="emms__collapse-btn"></button>
                                </ul>
                            </div>
                            <div class="emms__plans__card__inside__bottom">
                                <a class="dtCursorPointer activeFormButton eventHiddenElements inactive"><span class="button__text">Accede</span></a>
                                <a class="dtCursorPointer activeButtonWithoutForm eventShowElements inactive"><span class="button__text">Accede</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="emms__plans__card emms__plans__card--premium">
                        <h3>Asistente VIP</h3>
                        <div class="emms__plans__card__inside">
                            <div class="emms__plans__card__inside__top">
                                <div class="emms__plans__card__inside__top--container">
                                    <h4>U$S 10</h4>
                                    <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI5YTNjYmFiMi0yMjkyLTQ2NGEtYTYzZS1hZmRhNmRlNmVmNzEifQ">Accede</a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside__list">
                                <ul class="emms__collapse__list close">
                                    <h4>Beneficios</h4>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las <a href="#agenda">conferencias</a></p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Volver a ver las conferencias todas las veces que quieras</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Participación en los sorteos</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Descuentos en herramientas y cursos</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Certificado de participación a las conferencias</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso ilimitado a todos los <a href="#agenda">Workshops prácticos</a></p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Certificado de asistencia a Workshops</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a licencias y descuentos en herramientas para tu estrategia digital</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Networking con participantes y speakers</p>
                                    </li>
                                    <button class="emms__collapse-btn"></button>
                                </ul>
                            </div>
                            <div class="emms__plans__card__inside__bottom">
                                <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI5YTNjYmFiMi0yMjkyLTQ2NGEtYTYzZS1hZmRhNmRlNmVmNzEifQ">Accede</a>
                            </div>
                        </div>
                    </div>
                    <div class="emms__plans__card emms__plans__card--double emms__plans__card--premium">
                        <h3>Pack Empresas</h3>
                        <div class="emms__plans__card__flex-content">
                            <div class="emms__plans__card__inside">
                                <div class="emms__plans__card__inside__top">
                                    <div class="emms__plans__card__inside__top__off">
                                        <p>15% OFF</p>
                                    </div>
                                    <div class="emms__plans__card__inside__top--container">
                                        <h4><span>5 entradas</span>U$S 42,50</h4>
                                        <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI1YjRkM2IxMS00NTI1LTQyYTktYTMwYi0xMGEzZGM4YmM2ZGQifQ">Accede</a>
                                    </div>
                                </div>
                                <div class="emms__plans__card__inside__list">
                                    <ul class="emms__collapse__list close">
                                        <h4>Beneficios</h4>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las <a href="#agenda">conferencias</a></p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Volver a ver las conferencias todas las veces que quieras</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Participación en los sorteos</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Descuentos en herramientas y cursos</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Certificado de participación a las conferencias</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso ilimitado a todos los <a href="#agenda">Workshops prácticos</a></p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Certificado de asistencia a Workshops</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a licencias y descuentos en herramientas para tu estrategia digital</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Networking con participantes y speakers</p>
                                        </li>
                                        <button class="emms__collapse-btn"></button>
                                    </ul>
                                </div>
                                <div class="emms__plans__card__inside__bottom">
                                    <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI1YjRkM2IxMS00NTI1LTQyYTktYTMwYi0xMGEzZGM4YmM2ZGQifQ">Accede</a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside">
                                <div class="emms__plans__card__inside__top">
                                    <div class="emms__plans__card__inside__top__off">
                                        <p>20% OFF</p>
                                    </div>
                                    <div class="emms__plans__card__inside__top--container">
                                        <h4><span>10 entradas</span>U$S 80</h4>
                                        <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI3ZjU2M2U0Ni1lNjA2LTRmYzktYTQ2OC01Yzk3OTFmMzFjMGIifQ">Accede</a>
                                    </div>
                                </div>
                                <div class="emms__plans__card__inside__list">
                                    <ul>
                                        <h4>Beneficios</h4>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las <a href="#agenda">conferencias</a></p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Volver a ver las conferencias todas las veces que quieras</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Participación en los sorteos</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Descuentos en herramientas y cursos</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Certificado de participación a las conferencias</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso ilimitado a todos los <a href="#agenda">Workshops prácticos</a></p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Certificado de asistencia a Workshops</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a licencias y descuentos en herramientas para tu estrategia digital</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Networking con participantes y speakers</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="emms__plans__card__inside__bottom">
                                    <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI3ZjU2M2U0Ni1lNjA2LTRmYzktYTQ2OC01Yzk3OTFmMzFjMGIifQ">Accede</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="vip"></div>
        </div>


        <!-- Grid -->
        <section class="emms__grid emms__grid--3 emms__bg-w">
            <div class="emms__container--md">
                <div class="emms__grid__title">
                    <h2>Vive la experiencia completa en EMMS Digital Trends</h2>
                </div>
                <ul class="emms__grid__content">
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/conferencias.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Conferencias</h3>
                            <p>Encuentra a tus máximos referentes internacionales compartiendo ideas y experiencias en un mismo lugar para descubrir las últimas tendencias en Marketing Digital.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/entrevistas.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Entrevistas</h3>
                            <p>Asiste a conversaciones con directivos y profesionales que marcan tendencia con sus negocios para escuchar sus mejores consejos, experiencias y proyecciones del mercado. </p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/exito.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Casos de Éxito</h3>
                            <p>Escucha directamente de los representantes de compañías líderes cuáles fueron las estrategias que impulsaron el éxito de sus negocios y conoce sus mejores tácticas para vender más.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/networking.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Networking</h3>
                            <p>Únete a valiosas conversaciones con los exponentes del sector, conoce nuevos colegas y expande las redes de tu negocio para impulsar su crecimiento.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/workshop.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Workshops</h3>
                            <p>Capacítate en talleres prácticos de asistencia reducida con especialistas destacados en la industria. Interactúa y pon en práctica tus conocimientos.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/recursos.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Biblioteca de Recursos</h3>
                            <p>Encuentra E-books, infografías, cápsulas audiovisuales, guías, plantillas y muchos más contenidos descargables y gratuitos en la sección Biblioteca de Recursos.</p>
                        </div>
                    </li>
                </ul>
                <div class="emms__grid__bottom">
                    <a href="#entradas" class="emms__cta">OBTÉN TU ENTRADA VIP</a>
                </div>
            </div>
        </section>


    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/certificateModal.js"></script>
    <script src="src/<?= VERSION ?>/js/date.js"></script>
    <script src="src/<?= VERSION ?>/js/certificate/certificateDt.js" type="module"></script>

</body>

</html>
