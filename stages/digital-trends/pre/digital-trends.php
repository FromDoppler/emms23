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
                    <li class="emms__header__nav__menu__dropdown">
                        <a href="#" class="active">digital trends</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">agenda</a></li>
                            <li><a href="#entradas">entradas</a></li>
                        </ul>
                    </li>
                    <li><a href="/sponsors">biblioteca de recursos</a></li>
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


        <!-- Hero with form-->
        <section class="emms__hero-registration emms__hero-registration--video eventHiddenElements" id="registro">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__columns">
                <div class="emms__hero-registration__text emms__fade-in">
                    <h1><em>EVENTO ONLINE Y GRATUITO - DEL 13 AL 16 DE NOV</em> ¡Vuelve el EMMS Digital Trends!</h1>
                    <ul class="emms__hero-registration__text__checklist">
                        <li>CONFERENCIAS</li>
                        <li>NETWORKING</li>
                        <li>WORKSHOPS</li>
                    </ul>
                    <p>Reserva tu lugar en el mayor evento hispano de Marketing Digital. Regístrate ahora y desbloquea la Biblioteca de Recursos gratuita para empezar a inspirarte.</p>
                </div>
                <div class="emms__hero-registration__form emms__fade-in">
                    <!-- Form -->
                    <form class="emms__form popUpForm" id="popUpForm" novalidate autocomplete="off">
                        <ul class="emms__form__field-group">
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="email">Email *</label>
                                    <input type="email" name="email" id="email" placeholder="&iexcl;No olvides usar @!" class="email required" autocomplete="off">
                                </div>
                            </li>
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" placeholder="Tu nombre" class="required error-name nameLength" autocomplete="off">
                                </div>
                            </li>
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="company">Empresa *</label>
                                    <input type="text" name="company" id="company" placeholder="Nombre de tu empresa o negocio" class="email required" autocomplete="off">
                                </div>
                            </li>
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="jobPosition">Cargo *</label>
                                    <select class="required" name="jobPosition" id="jobPosition" autocomplete="off">
                                        <option disabled selected value>Elige un cargo</option>
                                        <option value="CEO / Director General">CEO / Director General</option>
                                        <option value="CMO / Marketing Manager">CMO / Marketing Manager</option>
                                        <option value="Gerente de Ventas">Gerente de Ventas</option>
                                        <option value="E-commerce Manager">E-commerce Manager</option>
                                        <option value="Project Manager / Líder de equipo">Project Manager / Líder de equipo</option>
                                        <option value="Especialista / Consultor en Marketing">Especialista / Consultor en Marketing Digital</option>
                                        <option value="Asistente de Marketing / Comunicación / Ventas">Asistente de Marketing / Comunicación / Ventas</option>
                                        <option value="Ejecutivo/a de Cuentas">Ejecutivo/a de Cuentas</option>
                                        <option value="Redactor/a de contenidos / Copywriter">Redactor/a de contenidos / Copywriter</option>
                                        <option value="Diseñador/a">Diseñador/a</option>
                                        <option value="Pasante / interno / trainee">Pasante / interno / trainee</option>
                                        <option value="Estudiante">Estudiante</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </li>
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="telefono">Teléfono</label>
                                    <input type="tel" name="phone" id="phone" class="phone phone-number" autocomplete="off">
                                </div>
                            </li>
                        </ul>
                        <ul class="emms__form__field-group">
                            <li class="emms__form__field-item emms__form__field-item__checkbox">
                                <div class="holder">
                                    <input name="privacy" type="checkbox" id="acepto-politicas" value="true" class="required check acept-politic"><span class="checkmark"></span><label for="acepto-politicas">
                                        Acepto la Pol&iacute;tica de Privacidad de Doppler *
                                    </label>
                                </div>
                            </li>
                            <li class="emms__form__field-item emms__form__field-item__checkbox">
                                <div class="holder">
                                    <input name="promotions" type="checkbox" id="acepto-promociones" value="true"><span class="checkmark"></span><label for="acepto-promociones">
                                        Acepto recibir promociones de Doppler</label>
                                </div>
                            </li>
                        </ul>
                        <div class="emms__form__btn">
                            <button class="emms__cta" id="register-button" type="button"><span class="button__text">REGÍSTRATE GRATIS</span></button>
                        </div>
                        <div class="emms__form__legal close">
                            <a class="emms__form__legal__btn" id="legalBtn">Información básica sobre privacidad </a>
                            <p>Doppler te informa que los datos de car&aacute;cter personal que nos proporciones al rellenar el presente formulario ser&aacute;n tratados por Doppler LLC como responsable de esta Web.<br>
                                <strong>Finalidad: </strong>Gestionar el alta de registro a la capacitación, enviarte material vinculado a la misma e información sobre Doppler así como nuestros futuros eventos o capacitaciones.<br>
                                <strong>Legitimaci&oacute;n: </strong>Consentimiento del interesado. <br>
                                <strong>Destinatarios: </strong>Tus datos ser&aacute;n guardados por Doppler y los co-organizadores del evento, Unbounce como empresa de creaci&oacute;n de Landing Pages, DigitalOcean como empresa de hosting y Zapier como herramienta de integraci&oacute;n de apps.<br>
                                <strong>Informaci&oacute;n adicional: </strong>En la <a href="https://www.fromdoppler.com/es/legal/privacidad/" target="_blank" rel="noopener">Pol&iacute;tica de Privacidad</a> de Doppler encontrar&aacute;s informaci&oacute;n adicional
                                sobre la recopilaci&oacute;n y el uso de su informaci&oacute;n personal por parte de Doppler, incluida
                                informaci&oacute;n sobre acceso, conservaci&oacute;n, rectificaci&oacute;n, eliminaci&oacute;n, seguridad,
                                transferencias
                                transfronterizas y otros temas. <br>
                            </p>
                        </div>
                    </form>
                    <!-- End form -->
                </div>
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

        <!-- Hero without form-->
        <section class="emms__hero-registration emms__hero-registration--noform emms__hero-registration--video eventHiddenElements eventShowElements">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__text emms__fade-in">
                <h1><em>EVENTO ONLINE Y GRATUITO - DEL 13 AL 16 DE NOV</em> ¡Vuelve el EMMS Digital Trends!</h1>
                <ul class="emms__hero-registration__text__checklist checklist--center">
                    <li>Conferencias</li>
                    <li>Networking</li>
                    <li>Workshops</li>
                </ul>
                <p>Llega el mayor evento de Marketing Digital. Inspírate y capacítate con tus referentes mundiales, estés donde estés. </p>
                <a class="emms__cta activeButtonWithoutForm"><span class="button__text">REGÍSTRATE GRATIS</span></a>
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


        <!-- Event numbers -->
        <section class="emms__eventnumbers emms__eventnumbers--large" id="boxNumberLarge">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">EMMS a lo largo del tiempo</h2>
                <ul class="emms__fade-in">
                    <li>
                        <p class="number" id="count1L">265</p>
                        <span>REGISTRADOS</span>
                    </li>
                    <li>
                        <p class="number" id="count4L">190</p>
                        <span>Speakers</span>
                    </li>
                    <li>
                        <p class="number" id="count3L">10</p>
                        <span>Países</span>
                    </li>
                    <li>
                        <p class="number" id="count2L">15</p>
                        <span>Años</span>
                    </li>
                </ul>
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
                    <a class="emms__cta activeFormButton eventHiddenElements">REGÍSTRATE GRATIS</a>
                    <a class="emms__cta activeButtonWithoutForm eventHiddenElements eventShowElements"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                </div>
            </div>
        </section>

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
                            <p>Asiste a conversaciones con directivos y profesionales que marcan tendencia con sus negocios para escuchar sus mejores consejos, experiencias y proyecciones del mercado.</p>
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
                    <a class="emms__cta activeFormButton eventHiddenElements">REGÍSTRATE GRATIS</a>
                    <a class="emms__cta activeButtonWithoutForm eventHiddenElements eventShowElements"><span class="button__text">INSCRÍBETE GRATIS</span></a>
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
                    <div class="emms__plans__card">
                        <h3>Asistente Free</h3>
                        <div class="emms__plans__card__inside">
                            <div class="emms__plans__card__inside__top">
                                <div class="emms__plans__card__inside__top--container">
                                    <h4>Gratis</h4>
                                    <a class="dtCursorPointer activeFormButton eventHiddenElements"><span class="button__text">Accede</span></a>
                                    <a class="dtCursorPointer activeButtonWithoutForm eventShowElements"><span class="button__text">Accede</span></a>
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

        <!-- Register modal -->
        <div id="modalRegister" class="emms__register-modal">
            <div class="emms__register-modal__window">
                <!-- Form -->
                <form class="emms__form popUpForm" id="popUpForm" novalidate autocomplete="off">
                    <h4><strong>Regístrate al EMMS DT 2023 ✍</strong><br>Reserva tu cupo en el máximo evento de Marketing Digital en Latam y España</h4>
                    <ul class="emms__form__field-group">
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="email">Email *</label>
                                <input type="email" name="email" id="email" placeholder="&iexcl;No olvides usar @!" class="email required" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="name">Nombre *</label>
                                <input type="text" name="name" id="name" placeholder="Tu nombre" class="required error-name nameLength" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="company">Empresa *</label>
                                <input type="text" name="company" id="company" placeholder="Nombre de tu empresa o negocio" class="email required" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="jobPosition">Cargo *</label>
                                <select class="required" name="jobPosition" id="jobPosition" autocomplete="off">
                                    <option disabled selected value>Elige un cargo</option>
                                    <option value="CEO / Director General">CEO / Director General</option>
                                    <option value="CMO / Marketing Manager">CMO / Marketing Manager</option>
                                    <option value="Gerente de Ventas">Gerente de Ventas</option>
                                    <option value="E-commerce Manager">E-commerce Manager</option>
                                    <option value="Project Manager / Líder de equipo">Project Manager / Líder de equipo</option>
                                    <option value="Especialista / Consultor en Marketing">Especialista / Consultor en Marketing Digital</option>
                                    <option value="Asistente de Marketing / Comunicación / Ventas">Asistente de Marketing / Comunicación / Ventas</option>
                                    <option value="Ejecutivo/a de Cuentas">Ejecutivo/a de Cuentas</option>
                                    <option value="Redactor/a de contenidos / Copywriter">Redactor/a de contenidos / Copywriter</option>
                                    <option value="Diseñador/a">Diseñador/a</option>
                                    <option value="Pasante / interno / trainee">Pasante / interno / trainee</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="telefono">Teléfono</label>
                                <input type="tel" name="phone" id="phone2" class="phone phone-number" autocomplete="off">
                            </div>
                        </li>
                    </ul>
                    <ul class="emms__form__field-group">
                        <li class="emms__form__field-item emms__form__field-item__checkbox">
                            <div class="holder">
                                <input name="privacy" type="checkbox" id="acepto-politicas2" value="true" class="required check acept-politic"><span class="checkmark"></span><label for="acepto-politicas2">
                                    Acepto la Pol&iacute;tica de Privacidad de Doppler *
                                </label>
                            </div>
                        </li>
                        <li class="emms__form__field-item emms__form__field-item__checkbox">
                            <div class="holder">
                                <input name="promotions" type="checkbox" id="acepto-promociones2" value="true"><span class="checkmark"></span><label for="acepto-promociones2">
                                    Acepto recibir promociones de Doppler</label>
                            </div>
                        </li>
                    </ul>
                    <div class="emms__form__btn">
                        <button class="emms__cta" id="register-button" type="button"><span class="button__text">REGÍSTRATE GRATIS</span></button>
                    </div>
                    <div class="emms__form__legal close">
                        <a class="emms__form__legal__btn" id="legalBtn">Información básica sobre privacidad </a>
                        <p>Doppler te informa que los datos de car&aacute;cter personal que nos proporciones al rellenar el presente formulario ser&aacute;n tratados por Doppler LLC como responsable de esta Web.<br>
                            <strong>Finalidad: </strong>Gestionar el alta de registro a la capacitación, enviarte material vinculado a la misma e información sobre Doppler así como nuestros futuros eventos o capacitaciones.<br>
                            <strong>Legitimaci&oacute;n: </strong>Consentimiento del interesado. <br>
                            <strong>Destinatarios: </strong>Tus datos ser&aacute;n guardados por Doppler y los co-organizadores del evento, Unbounce como empresa de creaci&oacute;n de Landing Pages, DigitalOcean como empresa de hosting y Zapier como herramienta de integraci&oacute;n de apps.<br>
                            <strong>Informaci&oacute;n adicional: </strong>En la <a href="https://www.fromdoppler.com/es/legal/privacidad/" target="_blank" rel="noopener">Pol&iacute;tica de Privacidad</a> de Doppler encontrar&aacute;s informaci&oacute;n adicional
                            sobre la recopilaci&oacute;n y el uso de su informaci&oacute;n personal por parte de Doppler, incluida
                            informaci&oacute;n sobre acceso, conservaci&oacute;n, rectificaci&oacute;n, eliminaci&oacute;n, seguridad,
                            transferencias
                            transfronterizas y otros temas. <br>
                        </p>
                    </div>
                </form>
                <!-- End form -->
                <button class="emms__register-modal__window__close dtCursorPointer activeFormButton eventHiddenElements"></button>
            </div>
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

        <!-- Central Video -->
        <section class="emms__centralvideo">
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Por qué EMMS Digital Trends</h2>
                    <p>Descubre en este video por qué el EMMS Digital Trends 2023 es el lugar ideal para capacitarte e inspirarte con las últimas tendencias en Marketing Digital.</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="https://goemms.com/src/img/EmmsDigitalTrends.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in eventHiddenElements">
                    <a class="activeFormButton emms__cta">REGÍSTRATE GRATIS</a>
                    <small class="eventHiddenElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                    <small class="eventHiddenElements eventShowElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./registrado#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>

                <div class="emms__centralvideo__cta emms__fade-in digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a class="emms__cta activeButtonWithoutForm"><span class="button__text">REGÍSTRATE GRATIS</span></a>
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
                    <a class="activeFormButton emms__cta emms__fade-in">REGÍSTRATE GRATIS</a>
                </div>
                <div class="emms__userscomments__cta digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a class="activeFormButton emms__cta emms__fade-in"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                </div>
            </div>
        </section>


        <?php if (!ENABLE_DIGITALTRENDS_SPONSORS) : ?>
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
                    <small class="emms__fade-in">¿Quieres ser Partner del EMMS? Escríbenos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
                </div>
            </section>
        <?php else : ?>
            <!-- Companies list -->
            <section class="emms__companies emms__companies--categories" id="aliados">
                <div class="emms__container--lg">
                    <h2 class="emms__fade-in">Nos acompañan en esta edición:</h2>
                    <h3>SPONSORS</h3>
                    <ul class="emms__companies__list emms__companies__list--lg  emms__fade-in">
                        <?php $sponsors = $db->getSponsorsByType('SPONSOR');
                        foreach ($sponsors as $sponsor) : ?>
                            <li class="emms__companies__list__item">
                                <?php if ($sponsor['link_site']) : ?>
                                    <a href="<?= $sponsor['link_site'] ?>" target="_blank">
                                    <?php endif ?>
                                    <img src="./adm23/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                                    <?php if ($sponsor['link_site']) : ?>
                                    </a>
                                <?php endif ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <div class="emms__companies__divisor"></div>
                    <h3>MEDIA PARTNERS EXCLUSIVE</h3>
                    <ul class="emms__companies__list emms__companies__list  emms__fade-in">
                        <?php $sponsors = $db->getSponsorsByType('PREMIUM');
                        foreach ($sponsors as $sponsor) : ?>
                            <li class="emms__companies__list__item">
                                <?php if ($sponsor['link_site']) : ?>
                                    <a href="<?= $sponsor['link_site'] ?>" target="_blank">
                                    <?php endif ?>
                                    <img src="./adm23/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                                    <?php if ($sponsor['link_site']) : ?>
                                    </a>
                                <?php endif ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <div class="emms__companies__divisor"></div>
                    <h3>MEDIA PARTNERS STARTERS</h3>
                    <ul class="emms__companies__list emms__companies__list  emms__fade-in" id="mediaPartenersStarters">
                        <?php $sponsors = $db->getSponsorsByType('STARTER');
                        foreach ($sponsors as $sponsor) : ?>
                            <li class="emms__companies__list__item">
                                <?php if ($sponsor['link_site']) : ?>
                                    <a href="<?= $sponsor['link_site'] ?>" target="_blank">
                                    <?php endif ?>
                                    <img src="./adm23/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                                    <?php if ($sponsor['link_site']) : ?>
                                    </a>
                                <?php endif ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <small class="emms__fade-in"><strong>¿Quieres ser aliado del EMMS?</strong> ¡Hablemos! Escríbenos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
                </div>
            </section>
        <?php endif ?>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/dateCounter.js"></script>
    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/popUp.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/counterAnimation.js"></script>
    <script src="src/<?= VERSION ?>/js/date.js"></script>
    <script src="src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once('././src/components/intellInput.php'); ?>

</body>

</html>