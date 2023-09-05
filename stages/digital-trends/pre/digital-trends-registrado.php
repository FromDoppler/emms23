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
                            <li><a href="#vip">secciones VIP</a></li>
                            <li><a href="https://www.digital-trends.goemms.com/workshops?utm_source=manage.wix.com">contenido Premium</a></li>
                        </ul>
                    </li>
                    <li><a href="/sponsors">contenido exclusivo</a></li>
                    <li><a href="/ediciones-anteriores">ediciones anteriores</a></li>
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
                <h1>Lorem ipsum dolor sit amet consectetuest la</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Facilisi ut eu eget ipsum. Dolor adipiscing urna ac sed arcu sed tempus. Venenatis diam etiam nulla viverra.</p>
                <div class="emms__hero-registration__text__strong">
                    <div class="emms__hero-registration__text__strong__icon"></div>
                    <p>¿Ya tienes tu entrada VIP para acceder a los Workshops y el Networking?</p>
                </div>
                <a href="https://4844832.wixsite.com/emms" target="_blank" class="emms__cta">NO, ACCEDER AHORA</a>
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
                    <h2>Agenda</h2>
                    <p>Estos son los <strong>ponentes</strong> que nos acompañarán en esta edición y las <strong>temáticas</strong> de sus charlas. </p>
                </div>
                <!-- Speakers -->
                <?php include('./src/components/speakers.php') ?>
                <!-- End list -->
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
                        <li>Acceso a todas las conferencias en vivo</li>
                        <li>Acceso a casos de éxito en vivo</li>
                        <li>Acceso a entrevistas en vivo</li>
                        <li>Acceso a todas las conferencias grabadas</li>
                        <li>Acceso a todos los contenidos premium</li>
                        <li>Acceso a los sorteos</li>
                        <li>Descuentos en herramientas y cursos</li>
                        <li>Certificado de participación</li>
                        <li>Acceso a grupos de Slack con la comunidad EMMS</li>
                        <li>Acceso ilimitado a todos los workshops prácticos</li>
                        <li>Acceso a licencias en las herramientas de los WS</li>
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
                                    <a class="inactive"><span class="button__text">Botón</span></a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside__list">
                                <ul class="emms__collapse__list close">
                                    <h4>Beneficios</h4>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-wrong.svg" alt="no">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <button class="emms__collapse-btn"></button>
                                </ul>
                            </div>
                            <div class="emms__plans__card__inside__bottom">
                                <a class="inactive"><span class="button__text">Botón</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="emms__plans__card emms__plans__card--premium">
                        <h3>Asistente VIP</h3>
                        <div class="emms__plans__card__inside">
                            <div class="emms__plans__card__inside__top">
                                <div class="emms__plans__card__inside__top--container">
                                    <h4>U$S 10</h4>
                                    <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside__list">
                                <ul class="emms__collapse__list close">
                                    <h4>Beneficios</h4>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                        <p>Acceso a todas las conferencias en vivo</p>
                                    </li>
                                    <button class="emms__collapse-btn"></button>
                                </ul>
                            </div>
                            <div class="emms__plans__card__inside__bottom">
                                <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
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
                                        <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
                                    </div>
                                </div>
                                <div class="emms__plans__card__inside__list">
                                    <ul class="emms__collapse__list close">
                                        <h4>Beneficios</h4>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li class="emms__collapse__item"><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <button class="emms__collapse-btn"></button>
                                    </ul>
                                </div>
                                <div class="emms__plans__card__inside__bottom">
                                    <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
                                </div>
                            </div>
                            <div class="emms__plans__card__inside">
                                <div class="emms__plans__card__inside__top">
                                    <div class="emms__plans__card__inside__top__off">
                                        <p>15% OFF</p>
                                    </div>
                                    <div class="emms__plans__card__inside__top--container">
                                        <h4><span>10 entradas</span>U$S 42,50</h4>
                                        <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
                                    </div>
                                </div>
                                <div class="emms__plans__card__inside__list">
                                    <ul>
                                        <h4>Beneficios</h4>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                        <li><img src="src/img/icons/icon-check--violet.svg" alt="sí">
                                            <p>Acceso a todas las conferencias en vivo</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="emms__plans__card__inside__bottom">
                                    <a href="https://4844832.wixsite.com/emms" target="_blank">Botón</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="vip"></div>
        </div>


        <!-- Features -->
        <div class="emms__features emms__features--icon-top">
            <div class="emms__features__title emms__fade-in">
                <img class="icon-vip" src="src/img/icons/icon-star-gradient.png" alt="Icon">
                <h2>Módulo parte VIP</h2>
                <p>Lorem ipsum dolor sit amet consectetur. Enim viverra enim lorem mauris.<br>Ut sit arcu sed fermentum sit in euismod sed mattis</p>
            </div>
            <div class="emms__features__divisor"></div>
            <div class="emms__features__item emms__fade-in emms__features__item--reverse">
                <div class="emms__container--md">
                    <div class="emms__features__item__image">
                        <img src="src/img/editions/emms2018.png" alt="Image">
                    </div>
                    <div class="emms__features__item__text">
                        <h3>Lorem ipsum dolor sit</h3>
                        <p>Lorem ipsum dolor sit amet consectetur. Id at purus ut id. Nisi mauris faucibus nibh velit. Luctus cursus maecenas vitae mauris. Venenatis vitae aliquam lacus aliquam arcu. Facilisi.</p>
                        <a href="https://4844832.wixsite.com/emms" target="_blank" class="emms__cta">COMPRA TUS ENTRADAS</a>
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
                        <h3>Lorem ipsum dolor sit</h3>
                        <p>Lorem ipsum dolor sit amet consectetur. Id at purus ut id. Nisi mauris faucibus nibh velit. Luctus cursus maecenas vitae mauris. Venenatis vitae aliquam lacus aliquam arcu. Facilisi.</p>
                        <a href="https://4844832.wixsite.com/emms" target="_blank" class="emms__cta">COMPRA TUS ENTRADAS</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Grid -->
        <section class="emms__grid emms__grid--3 emms__bg-w">
            <div class="emms__container--md">
                <div class="emms__grid__title">
                    <h2>Título (Propuestas de valor)</h2>
                </div>
                <ul class="emms__grid__content">
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                    <li class="emms__grid__item">
                        <div class="emms__grid__item__image">
                            <img src="src/img/editions/emms2018.png" alt="Image">
                        </div>
                        <div class="emms__grid__item__text">
                            <h3>Titulo aqui</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cras lectus in ligula sit. Dolor in vitae leo arcu etiam rhoncus feugiat nec. Ornare sit amet sed nec suspendisse ornare.</p>
                        </div>
                    </li>
                </ul>
                <div class="emms__grid__bottom">
                    <a href="https://4844832.wixsite.com/emms" target="_blank" class="emms__cta">ADQUIRÍ TUS ENTRADAS</a>
                </div>
            </div>
        </section>


    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>

</body>

</html>
