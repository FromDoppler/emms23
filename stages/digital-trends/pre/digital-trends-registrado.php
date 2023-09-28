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
                    <li><a href="/sponsors">biblioteca de recursos</a></li>
                    <li><a href="/ediciones-anteriores">ediciones anteriores</a></li>
                    <li><a href="https://www.digital-trends.goemms.com/">VIP</a></li>
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
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&text=', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fdigital-trends&title=', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-registration emms__hero-registration--noform emms__hero-registration--video">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__text emms__fade-in">
                <h1>Ya eres parte del Digital Trends</h1>
                <div class="emms__hero-registration__text__strong">
                    <div class="emms__hero-registration__text__strong__icon"></div>
                    <p>Si aún no tienes tu Entrada VIP, adquiérela ahora para acceder a Workshops prácticos con tus referentes preferidos y sesiones de Networking con cientos de colegas.</p>
                </div>
                <a href="#entradas" target="_blank" class="emms__cta">COMPRA TU ENTRADA VIP</a>
            </div>
            <div class="emms__hero-registration__bottom emms__fade-in">
                <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
                <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
            </div>
        </section>


        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Agenda EMMS Digital Trends 2023</h2>
                    <p>¡Seguiremos confirmando speakers muy pronto!</p>
                </div>
                <!-- Speakers -->
                <?php include('./src/components/speakers.php') ?>
                <!-- End list -->
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
                        <li>Acceso a todas las conferencias</li>
                        <li>Volver a ver las conferencias todas las veces que quieras</li>
                        <li>Participación en los sorteos</li>
                        <li>Descuentos en herramientas y cursos</li>
                        <li>Certificado de participación a las conferencias</li>
                        <li>Acceso ilimitado a todos los Workshops prácticos</li>
                        <li>Certificado de asistencia a Workshops</li>
                        <li>Acceso a licencias y descuentos en herramientas para tu estrategia digital</li>
                        <li>Networking con participantes y speakers</li>
                    </ul>
                </div>
                <div class="emms__plans__cards-container emms__fade-in">
                    <div class="emms__plans__card">
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
                                        <p>Acceso a todas las conferencias</p>
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
                                        <p>Acceso ilimitado a todos los Workshops prácticos</p>
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
                                <a class="dtCursorPointer activeFormButton eventHiddenElements"><span class="button__text">Accede</span></a>
                                <a class="dtCursorPointer activeButtonWithoutForm eventShowElements"><span class="button__text">Accede</span></a>
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
                                        <p>Acceso a todas las conferencias</p>
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
                                        <p>Acceso ilimitado a todos los Workshops prácticos</p>
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
                                        <p>5% OFF</p>
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
                                            <p>Acceso a todas las conferencias</p>
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
                                            <p>Acceso ilimitado a todos los Workshops prácticos</p>
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
                                        <p>15% OFF</p>
                                    </div>
                                    <div class="emms__plans__card__inside__top--container">
                                        <h4><span>10 entradas</span>U$S 42,50</h4>
                                        <a href="https://www.digital-trends.goemms.com/entradas/payment/eyJpbnRlZ3JhdGlvbkRhdGEiOnt9LCJwbGFuSWQiOiI3ZjU2M2U0Ni1lNjA2LTRmYzktYTQ2OC01Yzk3OTFmMzFjMGIifQ">Accede</a>
                                    </div>
                                </div>
                                <div class="emms__plans__card__inside__list">
                                    <ul>
                                        <h4>Beneficios</h4>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias</p>
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
                                            <p>Acceso ilimitado a todos los Workshops prácticos</p>
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
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Conferencias</h3>
                            <p>Encuentra a tus máximos referentes internacionales compartiendo ideas y experiencias en un mismo lugar. Además, descubre las últimas tendencias implementadas por las marcas más reconocidas de la industria.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Entrevistas</h3>
                            <p>Asiste a conversaciones íntimas en las que directivos y experimentados profesionales que marcan tendencia con sus negocios brindan sus mejores consejos, experiencias y proyecciones del mercado. </p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Casos de Éxito</h3>
                            <p>Escucha directamente de los representantes de compañías líderes cuáles fueron las estrategias que impulsaron el éxito de sus negocios y conoce sus mejores tácticas para vender más.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Networking</h3>
                            <p>Únete a valiosas conversaciones con los exponentes del sector y expande las redes de tu negocio para impulsar su crecimiento.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Workshops</h3>
                            <p>Capacítate con especialistas súper reconocidos en la industria en workshops de asistencia reducida, en los que podrás interactuar y poner en práctica tus conocimientos de la mano de experimentados profesionales del Marketing Digital.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Biblioteca de Recursos</h3>
                            <p>Encuentra E-books, infografías, guías, plantillas y muchos más contenidos descargables y gratuitos en la sección Biblioteca de Recursos.</p>
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

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>

</body>

</html>
