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


    <!-- Hellobar -->
    <div class="emms__hellobar fixed">
        <div class="emms__hellobar__container emms__fade-in">
            <p>Accede a <strong>Workshops</strong> y <strong>Networkings</strong> para potenciar aún más tus conocimientos.</p>
            <a href="#entradas">QUIERO MI ENTRADA VIP</a>
        </div>
    </div>


    <!-- Header -->
    <header class="emms__header hellobar-space">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-digitaltrends.png" alt="Digital Trends 2023"></a>
            </div>
            <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transition'] === "live-on")) : ?>
                <div class="emms__header__live">
                    <p>¡ESTAMOS EN VIVO EN EMMS E-COMMERCE!</p>
                </div>
            <?php endif; ?>
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
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&text=EMMS%20Digital%20Trends%202023%3A%20El%20mayor%20evento%20de%20Marketing%20Digital.%20Llega%20una%20nueva%20edici%C3%B3n%20del%20evento%20m%C3%A1s%20esperado%20por%20la%20comunidad%20del%20Marketing.%20Descubre%20las%20%C3%BAltimas%20tendencias%20y%20las%20estrategias%20que%20implementan%20los%20l%C3%ADderes%20del%20mundo%20para%20hacer%20crecer%20sus%20negocios.%20Gratis%20y%20online.%20%C2%A1Reserva%20tu%20cupo%20ahora!', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&title=EMMS%20Digital%20Trends%202023%3A%20El%20mayor%20evento%20de%20Marketing%20Digital.%20Llega%20una%20nueva%20edici%C3%B3n%20del%20evento%20m%C3%A1s%20esperado%20por%20la%20comunidad%20del%20Marketing.%20Descubre%20las%20%C3%BAltimas%20tendencias%20y%20las%20estrategias%20que%20implementan%20los%20l%C3%ADderes%20del%20mundo%20para%20hacer%20crecer%20sus%20negocios.%20Gratis%20y%20online.%20%C2%A1Reserva%20tu%20cupo%20ahora!', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-registration emms__hero-registration--noform emms__hero-registration--video hellobar-space">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__text emms__fade-in">
                <h1>Ya eres parte del Digital Trends</h1>
                <div class="emms__hero-registration__text__strong">
                    <div class="emms__hero-registration__text__strong__icon"></div>
                    <p>Si aún no tienes tu Entrada VIP, adquiérela ahora para acceder a Workshops prácticos con tus referentes preferidos y sesiones de Networking con cientos de colegas.</p>
                </div>
                <a href="#entradas" class="emms__cta">ACCEDE A TU ENTRADA VIP</a>
            </div>
            <div class="emms__hero-registration__bottom images emms__fade-in">
                <p>
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img src="src/img/marquee/meta.png" alt="Meta" class="sm">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img src="src/img/marquee/tiktok.png" alt="TikTok" class="sm">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">
                </p>
                <p>
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img src="src/img/marquee/meta.png" alt="Meta" class="sm">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img src="src/img/marquee/tiktok.png" alt="TikTok" class="sm">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">
                </p>
            </div>
        </section>


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


        <!-- Features -->
        <!--         <div class="emms__features emms__features--icon-top">
            <div class="emms__features__title emms__fade-in">
                <img class="icon-vip" src="src/img/icons/icon-star-gradient.png" alt="Icon">
                <h2>Exclusivo para asistentes VIP y Packs Empresas</h2>
                <p>Adquiere tus entradas VIP y accede a todos los workshops, sesiones de networking y contenidos exclusivos para vivir a pleno tu evento de Marketing preferido.</p>
            </div>
            <div class="emms__features__divisor"></div>
            <div class="emms__features__item emms__fade-in emms__features__item--reverse">
                <div class="emms__container--md">
                    <div class="emms__features__item__image">
                        <img src="src/img/editions/emms2018.png" alt="Image">
                    </div>
                    <div class="emms__features__item__text">
                        <h3>Workshops</h3>
                        <p>Salas reducidas de asistentes en las que podrás aprender con empresas referentes y profesionales que más admiras. Serán sesiones interactivas, donde podrás hacer preguntas y llevarte planes de acción resueltos.</p>
                        <a href="#entradas" class="emms__cta">ACCEDE A TU ENTRADA VIP</a>
                    </div>
                </div>
            </div>
            <div class="emms__features__divisor"></div>
            <div class="emms__features__item emms__fade-in">
                <div class="emms__container--md">
                    <div class="emms__features__item__image">
                        <img src="src/img/editions/emms2018.png" alt="Image">
                    </div>
                    <div class="emms__features__item__text">
                        <h3>Networking</h3>
                        <p>Disfruta de espacios de intercambio en los que podrás reunirte con colegas, extender las redes de tu negocio y entablar conversaciones uno a uno con empresas líderes en la industria.</p>
                        <a href="#entradas" class="emms__cta">ACCEDE A TU ENTRADA VIP</a>
                    </div>
                </div>
            </div>
        </div> -->


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
    <script src="src/<?= VERSION ?>/js/date.js"></script>
</body>

</html>
