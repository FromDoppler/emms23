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

<body class="emms__digitaltrends emms__digitaltrends--post">
    <?php include_once('././src/components/gtm.php');

    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); ?>

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-digitaltrends.png" alt="Digital Trends 2023"></a>
            </div>
            <?php if (($settings_phase_DT['event'] === "digital-trends") && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on")) : ?>
                <div class="emms__header__live">
                    <p>¡ESTAMOS EN VIVO EN EMMS DIGITAL TRENDS!</p>
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

        <!-- Hero with form-->
        <section class="emms__hero-registration emms__hero-registration--video eventHiddenElements" id="registro">
            <div class="emms__hero-registration__back emms__fade-in">
                <video src="https://goemms.com/src/img/video-back-dt.mp4" muted autoplay loop></video>
            </div>
            <div class="emms__hero-registration__columns">
                <div class="emms__hero-registration__text emms__fade-in">
                    <h1><em>EVENTO ONLINE Y GRATUITO</em> ¡El EMMS evolucionó!</h1>
                    <ul class="emms__hero-registration__text__checklist">
                        <li>CONFERENCIAS</li>
                        <li>NETWORKING</li>
                        <li>WORKSHOPS</li>
                    </ul>
                    <p>Revive el mayor evento de Marketing Digital. Inspírate y capacítate con tus referentes mundiales, estés donde estés.</p>
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
                <h1><em>EVENTO ONLINE Y GRATUITO</em> ¡El EMMS evolucionó!</h1>
                <ul class="emms__hero-registration__text__checklist checklist--center">
                    <li>Conferencias</li>
                    <li>Networking</li>
                    <li>Workshops</li>
                </ul>
                <p>Revive el mayor evento de Marketing Digital. Inspírate y capacítate con tus referentes mundiales, estés donde estés.</p>
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


        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Agenda EMMS Digital Trends 2023</h2>
                    <p>Descubre a los ponentes que nos acompañaron en esta edición y las temáticas de sus charlas</p>
                </div>
            </div>
            <!-- Speakers -->
            <div class="emms__calendar__subtitle emms__fade-in">
                <h4>CONFERENCIAS GRATUITAS</h4>
                <?php if (($_SERVER['PHP_SELF']) === "/digital-trends.php") : ?>
                    <a class="emms__cta sm activeFormButton eventHiddenElements">REGÍSTRATE GRATIS</a>
                    <a class="emms__cta sm activeButtonWithoutForm eventHiddenElements eventShowElements"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                <?php endif ?>
            </div>
            <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
                <?php
                require_once('./utils/DB.php');
                $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $speakers = $db->getAllSpeakers();
                foreach ($speakers as $speaker) : ?>
                    <?php if ((($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview")) && ($speaker['event'] === "digital-trends")) : ?>
                        <li class="emms__calendar__list__item">
                            <div class="emms__calendar__list__item__card">
                                <?php if ($speaker['exposes'] === "conference") : ?>
                                    <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                                        <p>Conferencia</p>
                                    </div>
                                <?php elseif ($speaker['exposes'] === "interview") : ?>
                                    <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                                        <p>Entrevista</p>
                                    </div>
                                <?php endif; ?>
                                <div class="emms__calendar__list__item__card__speaker">
                                    <div class="emms__calendar__list__item__card__speaker__image">
                                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                                    </div>
                                    <div class="emms__calendar__list__item__card__speaker__text">
                                        <h4><?= $speaker['name'] ?></h4>
                                        <h5><?= $speaker['job'] ?></h5>
                                        <ul>
                                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="emms__calendar__list__item__card__description">
                                    <p><?= $speaker['description'] ?></p>
                                </div>
                                <div class="emms__calendar__list__item__card__business">
                                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                                    <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
                <?php
                require_once('./utils/DB.php');
                $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $speakers = $db->getAllSpeakers();
                foreach ($speakers as $speaker) : ?>
                    <?php if ((($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview")) && ($speaker['event'] === "digital-trends")) : ?>
                        <li class="emms__calendar__list__item">
                            <div class="emms__calendar__list__item__card">
                                <?php if ($speaker['exposes'] === "conference") : ?>
                                    <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                                        <p>Conferencia</p>
                                    </div>
                                <?php elseif ($speaker['exposes'] === "interview") : ?>
                                    <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                                        <p>Entrevista</p>
                                    </div>
                                <?php endif; ?>
                                <div class="emms__calendar__list__item__card__speaker">
                                    <div class="emms__calendar__list__item__card__speaker__image">
                                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                                    </div>
                                    <div class="emms__calendar__list__item__card__speaker__text">
                                        <h4><?= $speaker['name'] ?></h4>
                                        <h5><?= $speaker['job'] ?></h5>
                                        <ul>
                                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                            <?php endif; ?>
                                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="emms__calendar__list__item__card__description">
                                    <p><?= $speaker['description'] ?></p>
                                </div>
                                <div class="emms__calendar__list__item__card__business">
                                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                                    <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <!-- VIP-->
            <div class="emms__calendar__vip emms__fade-in">
                <?php if (($_SERVER['PHP_SELF']) === "/digital-trends.php") : ?>
                    <div class="emms__calendar__vip__title emms__fade-in">
                        <h4>NETWORKING Y WORKSHOPS <strong>PARA ASISTENTES VIP</strong>
                            <a class="activeFormButton eventHiddenElements">¡RESERVA TU LUGAR!</a>
                            <a class="activeButtonWithoutForm eventHiddenElements eventShowElements">¡RESERVA TU LUGAR!</a>
                        </h4>
                    </div>
                <?php else : ?>
                    <div class="emms__calendar__vip__title full emms__fade-in">
                        <h4>NETWORKING Y WORKSHOPS <strong>PARA ASISTENTES VIP</strong></h4>
                        <p>Ya tengo mi entrada <a href="https://www.digital-trends.goemms.com/">¡QUIERO MIS ACCESOS!</a></p>
                    </div>
                <?php endif ?>
                <!-- List VIP-->
                <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
                    <?php
                    require_once('./utils/DB.php');
                    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $speakers = $db->getAllSpeakers();
                    foreach ($speakers as $speaker) : ?>
                        <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                            <li class="emms__calendar__list__item">
                                <div class="emms__calendar__list__item__card">
                                    <div class="emms__calendar__list__item__card__label">
                                        <p>Workshop</p>
                                    </div>
                                    <div class="emms__calendar__list__item__card__speaker">
                                        <div class="emms__calendar__list__item__card__speaker__image">
                                            <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                                        </div>
                                        <div class="emms__calendar__list__item__card__speaker__text">
                                            <h4><?= $speaker['name'] ?></h4>
                                            <h5><?= $speaker['job'] ?></h5>
                                            <ul>
                                                <?php if (!empty($speaker['sm_twitter'])) : ?>
                                                    <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                                    <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_instagram'])) : ?>
                                                    <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_facebook'])) : ?>
                                                    <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="emms__calendar__list__item__card__description">
                                        <p><?= $speaker['description'] ?></p>
                                    </div>
                                    <div class="emms__calendar__list__item__card__business">
                                        <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                                        <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
                    <?php
                    require_once('./utils/DB.php');
                    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $speakers = $db->getAllSpeakers();
                    foreach ($speakers as $speaker) : ?>
                        <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                            <li class="emms__calendar__list__item">
                                <div class="emms__calendar__list__item__card">
                                    <div class="emms__calendar__list__item__card__label">
                                        <p>Workshop</p>
                                    </div>
                                    <div class="emms__calendar__list__item__card__speaker">
                                        <div class="emms__calendar__list__item__card__speaker__image">
                                            <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                                        </div>
                                        <div class="emms__calendar__list__item__card__speaker__text">
                                            <h4><?= $speaker['name'] ?></h4>
                                            <h5><?= $speaker['job'] ?></h5>
                                            <ul>
                                                <?php if (!empty($speaker['sm_twitter'])) : ?>
                                                    <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                                    <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_instagram'])) : ?>
                                                    <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                                                <?php endif; ?>
                                                <?php if (!empty($speaker['sm_facebook'])) : ?>
                                                    <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="emms__calendar__list__item__card__description">
                                        <p><?= $speaker['description'] ?></p>
                                    </div>
                                    <div class="emms__calendar__list__item__card__business">
                                        <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                                        <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <!-- End list -->
                <div class="emms__container--lg">
                    <div class="emms__calendar__bottom emms__fade-in">
                        <a class="emms__cta activeFormButton eventHiddenElements">REGÍSTRATE GRATIS</a>
                        <a class="emms__cta activeButtonWithoutForm eventHiddenElements eventShowElements"><span class="button__text">REGÍSTRATE GRATIS</span></a>
                    </div>
                </div>
            </div>
        </section>


        <!-- Register modal -->
        <div id="modalRegister" class="emms__register-modal">
            <div class="emms__register-modal__window">
                <!-- Form -->
                <form class="emms__form" id="popUpForm" novalidate autocomplete="off">
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
                <button class="emms__register-modal__window__close dtCursorPointer activeFormButton eventHiddenElements"></button>
            </div>
        </div>


        <!-- Premium content -->
        <section class="emms__premium-content emms__premium-content--dark">
            <div class="emms__container--lg">
                <div class="emms__premium-content__text emms__fade-in">
                    <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                    <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu E-commerce.</p>
                    <a href="./sponsors" class="emms__cta emms__fade-in">ACCEDE AQUÍ</a>
                </div>
                <div class="emms__premium-content__picture emms__fade-in">
                    <img src="src/img/download--locked.png" alt="Contenido Premium">
                </div>
            </div>
        </section>


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
                    <a href="#registro" class="emms__cta">ACCEDE A LAS CONFERENCIAS</a>
                    <small class="eventHiddenElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                    <small class="eventHiddenElements eventShowElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./registrado#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>

                <div class="emms__centralvideo__cta emms__fade-in digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a class="emms__cta activeButtonWithoutForm"><span class="button__text">ACCEDE A LAS CONFERENCIAS</span></a>
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
                    <a href="#entradas" class="emms__cta emms__fade-in">RESERVA TU ENTRADA</a>
                </div>
                <div class="emms__userscomments__cta digitalTrendsBtn eventHiddenElements eventShowElements">
                    <a href="#entradas" class="emms__cta emms__fade-in"><span class="button__text">RESERVA TU ENTRADA</span></a>
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
                    <h2 class="emms__fade-in">Nos acompañaron en esta edición:</h2>
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
    <script src="src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once('././src/components/intellInput.php'); ?>

</body>

</html>
