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

<body class="emms__digitaltrends">
    <?php include_once('././src/components/gtm.php');

    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); ?>

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
                    <li><a href="#" class="active">digital trends</a>
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

        <!-- Hero without form-->
        <section class="emms__hero-registration emms__hero-registration--noform emms__hero-registration--video">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__text emms__fade-in">
                <h1><em>LOREM IPSUM DOLOR SIT AMET</em> Lorem ipsum dolor sit amet consectetuest la</h1>
                <ul class="emms__hero-registration__text__checklist checklist--center">
                    <li>LOREM IPSUM</li>
                    <li>LOREM IPSUM</li>
                    <li>LOREM IPSUM</li>
                </ul>
                <p>Inspírate y capacítate con los mayores referentes internacionales en Marketing Digital. Conferencias, Casos de Éxito, Workshops, Networking ¡y mucho más!</p>
                <a href="https://4844832.wixsite.com/emms" target="_blank" class="emms__cta">ADQUIRÍ TUS ENTRADAS</a>
            </div>
            <div class="emms__hero-registration__bottom emms__fade-in">
                <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
                <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
            </div>
        </section>

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


        <!-- Event numbers -->
        <section class="emms__eventnumbers emms__eventnumbers--large" id="boxNumberLarge">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Eventos y asistentes a lo largo del tiempo</h2>
                <ul class="emms__fade-in">
                    <li>
                        <p class="number" id="count1L">250</p>
                        <span>Inscriptos</span>
                    </li>
                    <li>
                        <p class="number" id="count2L">15</p>
                        <span>Ediciones</span>
                    </li>
                    <li>
                        <p class="number" id="count3L">10</p>
                        <span>Países</span>
                    </li>
                    <li>
                        <p class="number" id="count4L">180</p>
                        <span>Speakers</span>
                    </li>
                </ul>
            </div>
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
                        <div class="emms__plans__card__inside">
                            <div class="emms__plans__card__inside__top">
                                <div class="emms__plans__card__inside__top--container">
                                    <h3>Asistente Free</h3>
                                    <h4>Gratis</h4>
                                    <a href="">Botón</a>
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
                                <a href="">Botón</a>
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

        <!-- Central Video -->
        <section class="emms__centralvideo">
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Por qué EMMS Digital Trends 2023</h2>
                    <p>Descubre en este vídeo por qué el EMMS Digital Trends 2023 es el lugar ideal para capacitarte e inspirarte con las últimas tendencias en Marketing Digital</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/EmmsDigitalTrends.mp4" controls></video>
                </div>

                <div class="emms__centralvideo__cta emms__fade-in eventHiddenElements">
                    <a href="#registro" class="emms__cta">REGÍSTRATE GRATIS</a>
                    <small class="eventHiddenElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                    <small class="eventHiddenElements eventShowElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./registrado#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>

                <div class="emms__centralvideo__cta emms__fade-in digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a class="emms__cta"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                    <small class="eventHiddenElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                    <small class="eventHiddenElements eventShowElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./registrado#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>
            </div>
        </section>


        <!-- Users comments -->
        <section class="emms__userscomments emms__userscomments--dark">
            <div class="emms__background-b mb"></div>
            <div class="emms__background-b mb"></div>
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nuestros asistentes dicen:</h2>
                <ul class="emms__userscomments__list emms__userscomments__list--dk emms__fade-in">
                    <li class="emms__userscomments__list__item">
                        <p>“Hace 3 años ya que me sumo al EMMS para conocer todas las tendencias que se vienen en Marketing Digital. No solo aprendo y me llevo ideas para aplicar, sino que conozco mucha gente del sector y esto me ayuda a seguir creciendo”.<em>Candela<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Es increíble que podamos acceder de forma gratuita a un evento tan importante y con speakers internacionales. Es super entretenido, todas las conferencias son de máximo nivel ¡y encima más de una vez me llevé regalos!”.<em>Rubén<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Todos los años el EMMS me sorprende con una propuesta más innovadora. Siempre les recomiendo a colegas del Marketing que se sumen, porque es el lugar más valioso que encuentro para aprender sobre estrategias para mi negocio”.<em>Analía<img src="src/img/flag-espana.png" alt="España"></em></p>
                    </li>
                </ul>
                <ul class="emms__userscomments__list emms__userscomments__list--mb main-carousel" data-flickity>
                    <li class="emms__userscomments__list__item">
                        <p>“Hace 3 años ya que me sumo al EMMS para conocer todas las tendencias que se vienen en Marketing Digital. No solo aprendo y me llevo ideas para aplicar, sino que conozco mucha gente del sector y esto me ayuda a seguir creciendo”.<em>Candela<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Es increíble que podamos acceder de forma gratuita a un evento tan importante y con speakers internacionales. Es super entretenido, todas las conferencias son de máximo nivel ¡y encima más de una vez me llevé regalos!”.<em>Rubén<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Todos los años el EMMS me sorprende con una propuesta más innovadora. Siempre les recomiendo a colegas del Marketing que se sumen, porque es el lugar más valioso que encuentro para aprender sobre estrategias para mi negocio”.<em>Analía<img src="src/img/flag-espana.png" alt="España"></em></p>
                    </li>
                </ul>
                <div class="emms__userscomments__cta eventHiddenElements">
                    <a href="#registro" class="emms__cta emms__fade-in">REGÍSTRATE GRATIS</a>
                </div>
                <div class="emms__userscomments__cta digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a class="emms__cta emms__fade-in"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                </div>
            </div>
        </section>


        <!-- Companies list -->
        <section class="emms__companies ">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nos han acompañado en ediciones anteriores</h2>
                <ul class="emms__companies__list emms__fade-in">
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-metricool.png" alt="Metricool"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-wayra.png" alt="Wayra"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-asociacion-marketing-espana.png" alt="Asociación de Marketing de España"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-camece.png" alt="Camece"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-capece.png" alt="Capece"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-amvo.png" alt="AMVO"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-linkedin.png" alt="LinkedIn"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-bigbox.png" alt="Bigbox"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-semrush.png" alt="Semrush"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-crehana.png" alt="Crehana"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-marketing-4ecommerce.png" alt="Marketing 4 Ecommerce"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-vtex.png" alt="VTEX"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-banco-frances.png" alt="BBVA Francés"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-airbnb.png" alt="Airbnb"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-woocomerce.png" alt="Woocommerce"></li>
                </ul>
                <small class="emms__fade-in">¿Quieres ser Media Partner del EMMS? Escríbenos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>


    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/dateCounter.js"></script>
    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/homeDigital.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/counterAnimation.js"></script>

</body>

</html>
