<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head.php'); ?>
    <script type="module">
        import {
            isUserLogged,
            getUrlWithParams
        } from './src/<?= VERSION ?>/js/common/index.js';

        if (isUserLogged()) {
            window.location.href = getUrlWithParams('/ecommerce-registrado.php');
        }
    </script>
</head>

<body class="emms__ecommerce">

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="./index.php"><img src="src/img/logos/logo-emms-ecommerce.png" alt="Emms Ecommerce 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="./index.php">home</a></li>
                    <li class="emms__header__nav__menu__dropdown"><a href="#" class="active">ecommerce</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">AGENDA</a></li>
                            <li><a href="#aliados">ALIADOS</a></li>
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
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fecommerce.php&text=', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fecommerce.php&title=', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-form" id="registro">
            <div class="emms__container--lg">
                <div class="emms__hero-form__text emms__fade-in">
                    <h1><em>EVENTO ONLINE Y GRATUITO - 16 DE ABRIL</em> EMMS E-commerce 2023</h1>
                    <p>¡El EMMS evoluciona! Ahora podrás inspirarte y aprender con un evento exclusivo pensado para tu Tienda Online.</p>
                    <ul class="emms__hero-form__text__checklist">
                        <li>SPEAKERS INTERNACIONALES</li>
                        <li>TENDENCIAS E INNOVACIÓN</li>
                        <li>HERRAMIENTAS Y RECURSOS</li>
                    </ul>
                    <!-- Date counter -->
                    <div id="emmsCounter" value="2023-05-20T14:00:00.000Z">
                        <?php include_once('././src/components/date-counter.php'); ?>
                    </div>
                    <!-- End date counter -->
                </div>
                <div class="emms__hero-form__form emms__fade-in">
                    <!-- Form -->
                    <form class="emms__form" id="ecommerceForm" novalidate autocomplete="off">
                        <ul class="emms__form__field-group">
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="name">Nombre *</label>
                                    <input type="text" name="name" id="name" placeholder="Tu nombre" class="required error-name nameLength" autocomplete="off">
                                </div>
                            </li>
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="email">Email *</label>
                                    <input type="email" name="email" id="email" placeholder="&iexcl;No olvides usar @!" class="email required" autocomplete="off">
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
                                        Acepto recibir promociones de Doppler y sus aliados</label>
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
            <div class="emms__hero-form__bottom emms__fade-in">
                <p>IA >> AUTOMATION MARKETING >> UX >> CRO >> MARKETPLACES >> SEO >> RETARGETING >> SOCIAL SELLING >> EMAIL MARKETING >> ESTRATEGIAS DE VENTA >></p>
                <p>IA >> AUTOMATION MARKETING >> UX >> CRO >> MARKETPLACES >> SEO >> RETARGETING >> SOCIAL SELLING >> EMAIL MARKETING >> ESTRATEGIAS DE VENTA >></p>
            </div>
        </section>


        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Agenda EMMS E-commerce 2023</h2>
                    <p>Descubre antes que nadie a los <strong>ponentes</strong> que nos acompañarán en esta edición y las temáticas de sus charlas</p>
                </div>
                <!-- List -->
                <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
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
                                <h4>Mesa de Debate</h4>
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
                <div class="emms__calendar__bottom emms__fade-in">
                    <a href="#registro" class="emms__cta">INSCRÍBETE GRATIS AHORA</a>
                </div>
            </div>
        </section>


        <!-- Separator -->
        <div class="emms__separator"></div>


        <!-- Central Video -->
        <section class="emms__centralvideo">
            <div class="emms__background-b"></div>
            <div class="emms__background-b"></div>
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Llega una nueva versión del EMMS. Ahora, con una edición exclusiva para E-commerce</h2>
                    <p>Conoce en este video por qué este evento es el lugar ideal para capacitarte y aprender cómo escalar tu Tienda</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/video-ejemplo.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in">
                    <a href="#registro" class="emms__cta">REGÍSTRATE AHORA</a>
                    <small><i>¿Tienes dudas sobre el EMMS 2023?</i> Haz <a href="./home.php#preguntas-frecuentes" target="_blank">click aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>
            </div>
        </section>


        <!-- Users comments -->
        <section class="emms__userscomments emms__userscomments--dark">
            <div class="emms__background-b mb"></div>
            <div class="emms__background-b mb"></div>
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nuestros usuarios dicen:</h2>
                <ul class="emms__userscomments__list emms__userscomments__list--dk emms__fade-in">
                    <li class="emms__userscomments__list__item">
                        <p>“Con el EMMS siempre me llevo muchos tips para mi tienda. Y ahora, la edición para E-commerce ¡no me lo pierdo!”.<em>María Alejandra<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Me sirve mucho escuchar cada año a los mayores referentes del mundo para saber qué le conviene sumar a mi negocio.”<em>Sergio<img src="src/img/flag-espana.png" alt="España"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Encontrar un evento internacional y gratis es invaluable. ¡Cuenten con mi participación para seguir aprendiendo!”.<em>Ricardo<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                </ul>
                <ul class="emms__userscomments__list emms__userscomments__list--mb main-carousel" data-flickity>
                    <li class="emms__userscomments__list__item">
                        <p>“Con el EMMS siempre me llevo muchos tips para mi tienda. Y ahora, la edición para E-commerce ¡no me lo pierdo!”.<em>María Alejandra<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Me sirve mucho escuchar cada año a los mayores referentes del mundo para saber qué le conviene sumar a mi negocio.”<em>Sergio<img src="src/img/flag-espana.png" alt="España"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>“Encontrar un evento internacional y gratis es invaluable. ¡Cuenten con mi participación para seguir aprendiendo!”.<em>Ricardo<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Companies list -->
        <section class="emms__companies emms__companies--categories" id="aliados">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nos acompañan en esta edición:</h2>
                <h3>SPONSORS</h3>
                <ul class="emms__companies__list emms__companies__list--lg  emms__fade-in">
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
                <div class="emms__companies__divisor"></div>
                <h3>MEDIA PARTNERS EXCLUSIVE</h3>
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
                <div class="emms__companies__divisor"></div>
                <h3>MEDIA PARTNERS STARTERS</h3>
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
                <small class="emms__fade-in"><strong>¿Quieres ser aliado del EMMS E-commerce 2023?</strong> ¡Hablemos! Escríbenos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>
    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/dateCounter.js"></script>
    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/homeEcommerce.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/user.js" type="module"></script>

</body>

</html>
