<?php
require_once('././config.php');
require_once('././src/components/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
    <script type="module">
        import {
            hiddenOrShowUserUI
        } from './src/<?= VERSION ?>/js/user.js';
        hiddenOrShowUserUI('digital-trends');
    </script>
</head>

<body class="emms__ecommerce emms__ecommerce--post">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-ecommerce.png" alt="Emms Ecommerce 2023"></a>
            </div>
            <?php if ($digitalTrendsStates['isLive']) : ?>
                <div class="emms__header__live">
                    <p>¡ESTAMOS EN VIVO EN EMMS DIGITAL TRENDS!</p>
                </div>
            <?php endif ?>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/">home</a></li>
                    <li class="emms__header__nav__menu__dropdown"><a href="#" class="active">e-commerce</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">AGENDA</a></li>
                            <li><a href="#aliados">ALIADOS</a></li>
                        </ul>
                    </li>
                    <li><a href="/digital-trends">digital trends</a></li>
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

        <!-- Hero with form-->
        <section class="emms__hero-registration eventHiddenElements" id="registro">
            <div class="emms__hero-registration__columns">
                <div class="emms__hero-registration__text">
                    <h1><em>EVENTO ONLINE Y GRATUITO</em> ¡El EMMS evolucionó!</h1>
                    <p>Inspírate con un evento exclusivo pensado para tu Tienda Online. Revívelo ahora</p>
                    <ul class="emms__hero-registration__text__checklist">
                        <li>SPEAKERS INTERNACIONALES</li>
                        <li>TENDENCIAS E INNOVACIÓN</li>
                        <li>HERRAMIENTAS Y RECURSOS</li>
                    </ul>
                </div>
                <div class="emms__hero-registration__form">
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
                            <li class="emms__form__field-item">
                                <div class="holder">
                                    <label class="required-label" for="telefono">Teléfono</label>
                                    <input type="tel" name="phone" id="phone" class="phone phone-number" autocomplete="off">
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
                            <button class="emms__cta" id="register-button" type="button"><span class="button__text">ACCEDE GRATIS</span></button>
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
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">
                </p>
            </div>
        </section>

        <!-- Hero without form-->
        <section class="emms__hero-registration emms__hero-registration--noform eventHiddenElements eventShowElements" id="registro">
            <div class="emms__hero-registration__text">
                <h1>¡Estás a un paso de acceder al EMMS E-commerce 2023!</h1>
                <p>Revive el evento más importante de Latinoamérica y España sobre E-commerce. <strong>Más de 10.000 personas ya lo disfrutaron</strong>. ¡Ahora te toca a ti!</p>
                <button type="button" class="emms__cta ecommerceBtn"><span class="button__text">REVIVE EL EVENTO</span></button>
            </div>
            <div class="emms__hero-registration__bottom images emms__fade-in">
                <p>
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
                    <img src="src/img/marquee/linkedin.png" alt="LinkedIn">
                    <img src="src/img/marquee/spotify.png" alt="Spotify">
                    <img src="src/img/marquee/vtex.png" alt="Vtex">

                    <!--  Repeated marquee items -->
                    <img src="src/img/marquee/google.png" alt="Google">
                    <img class="sm" src="src/img/marquee/meta.png" alt="Meta">
                    <img src="src/img/marquee/youtube.png" alt="Youtube">
                    <img src="src/img/marquee/amazon.png" alt="Amazon">
                    <img src="src/img/marquee/metricool.png" alt="Metricool">
                    <img src="src/img/marquee/microsoft.png" alt="Microsoft">
                    <img class="sm" src="src/img/marquee/tiktok.png" alt="TikTok">
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
                    <h2>Agenda EMMS E-commerce 2023</h2>
                    <p>Descubre a los <strong>ponentes</strong> que nos acompañaron en esta edición y las <strong>temáticas</strong> de sus charlas</p>
                </div>
                <!-- List -->
                <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
                    <?php
                    require_once('./utils/DB.php');
                    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $speakers = $db->getAllSpeakers();
                    foreach ($speakers as $speaker) : ?>
                        <?php if ($speaker['event'] === "ecommerce") : ?>
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
                                    <?php elseif ($speaker['exposes'] === "successful-case") : ?>
                                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                                            <p>Caso de éxito</p>
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
                                        <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>&event=ecommerce" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
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
                        <?php if ($speaker['event'] === "ecommerce") : ?>
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
                                    <?php elseif ($speaker['exposes'] === "successful-case") : ?>
                                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                                            <p>Caso de éxito</p>
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
                                        <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>&event=ecommerce" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <!-- End list -->
                <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements">
                    <a href="#registro" class="emms__cta">ACCEDE A LAS CONFERENCIAS</a>
                </div>
                <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements eventShowElements">
                    <a class="emms__cta ecommerceBtn"><span class="button__text">ACCEDE A LAS CONFERENCIAS</span></a>
                </div>
            </div>
            <div class="emms__background-b"></div>
        </section>


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
            <div class="emms__background-b"></div>
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Llegó la nueva edición del EMMS, exclusiva para la industria E-commerce</h2>
                    <p>Conoce en este video por qué es el lugar ideal para capacitarte y aprender cómo escalar tu Tienda.</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/EmmsEcommerce.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in  eventHiddenElements ">
                    <a href="#registro" class="emms__cta">ACCEDE A LAS CONFERENCIAS</a>
                    <small class="eventHiddenElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                    <small class="eventHiddenElements eventShowElements"><i>¿Tienes dudas sobre el EMMS 2023?</i> <a href="./registrado#preguntas-frecuentes" target="_blank">Haz clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in  eventHiddenElements eventShowElements">
                    <a class="emms__cta ecommerceBtn"><span class="button__text">ACCEDE A LAS CONFERENCIAS</span></a>
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
                <h2 class="emms__fade-in-animation">Nos acompañaron en esta edición:</h2>
                <h3>SPONSORS</h3>
                <ul class="emms__companies__list emms__companies__list--lg emms__fade-in-animation">
                    <li class="emms__companies__list__item">
                        <a href="https://www.siteground.es/?utm_medium=link&amp;utm_source=event&amp;utm_campaign=EMMS23" target="_blank">
                            <img src="src/img/sponsors/20230414T140719789Z120490.png" alt="Sitegrouund">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.dondominio.com/es/?utm_medium=email&amp;utm_source=fromdoppler&amp;utm_campaign=et-email-confirmacion-registro-emmsdt-earlybirds-23&amp;_x-c=471&amp;_x-f=&amp;utm_content=evento" target="_blank">
                            <img src="src/img/sponsors/20230420T094246359Z142405.png" alt="DonDominio">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://dinorank.com/?utm_campaign=emms-ecommerce" target="_blank">
                            <img src="src/img/sponsors/20230331T142247249Z570898.png" alt="DinoRANK">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://raiolanetworks.es/" target="_blank">
                            <img src="src/img/sponsors/20230331T090921365Z589626.png" alt="Raiola Networks">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.easycommerce.tech/" target="_blank">
                            <img src="src/img/sponsors/20230414T140234384Z461729.png" alt="Easycommerce">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.eudedigital.com/" target="_blank">
                            <img src="src/img/sponsors/20230504T161313958Z354633.png" alt="EUDE">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://isocialweb.agency/" target="_blank">
                            <img src="src/img/sponsors/20230509T141340833Z995405.png" alt="iSocialWeb">
                        </a>
                    </li>
                </ul>
                <div class="emms__companies__divisor"></div>
                <h3>MEDIA PARTNERS EXCLUSIVE</h3>
                <ul class="emms__companies__list emms__fade-in-animation">
                    <li class="emms__companies__list__item">
                        <a href="https://www.chinarodriguez.com/?v=5b61a1b298a0" target="_blank">
                            <img src="src/img/sponsors/20230331T132012607Z101734.png" alt="China Rodriguez">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://aula.mujeresqueemprenden.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T082056564Z318990.png" alt="Mujeres que Emprenden">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.genwords.com/" target="_blank">
                            <img src="src/img/sponsors/20230515T205946043Z042243.png" alt="genwords">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://digitalizadas.com.ar/" target="_blank">
                            <img src="src/img/sponsors/20230403T082119139Z851342.png" alt="Digitalizadas">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.entreemprendedores.com.ar/" target="_blank">
                            <img src="src/img/sponsors/20230403T082142988Z265154.png" alt="Entrer Emprendedores Workshop">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.semrush.com/" target="_blank">
                            <img src="src/img/sponsors/20230511T165959342Z853537.png" alt="semrush">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.maipistiner.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T082208468Z719956.png" alt="Academia Mai Pistiner">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://jfdigital.es/" target="_blank">
                            <img src="src/img/sponsors/20230512T125048182Z219556.png" alt="jfdigital">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://interlat.co/" target="_blank">
                            <img src="src/img/sponsors/20230403T082234666Z839299.png" alt="Interlat">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://amdar.com.ar/" target="_blank">
                            <img src="src/img/sponsors/20230519T193430596Z049337.png" alt="amdar">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.real-trends.com/" target="_blank">
                            <img src="src/img/sponsors/20230510T140034429Z960929.png" alt="Real Trends">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://infonegocios.info/" target="_blank">
                            <img src="src/img/sponsors/20230331T132712231Z130779.png" alt="Infonegocios">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://www.luismaram.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T081656888Z509960.png" alt="Luis Maram">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://marketingdigitalexperience.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T081812354Z569059.png" alt="Marketing Digital Experience">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://elclubdeemprendedoras.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T081843858Z572614.png" alt="El Club de las Emprendedoras">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://epico.gob.ec/" target="_blank">
                            <img src="src/img/sponsors/20230403T081913937Z583841.png" alt="Epico">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://angiesammartino.com.ar/" target="_blank">
                            <img src="src/img/sponsors/20230511T170211939Z920894.png" alt="angiesammartino">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://cc.org.mx/" target="_blank">
                            <img src="src/img/sponsors/20230403T082006630Z161594.png" alt="Consejo de la Comunicación">
                        </a>
                    </li>
                    <li class="emms__companies__list__item">
                        <a href="https://sofiaalicio.com/" target="_blank">
                            <img src="src/img/sponsors/20230403T082033302Z221098.png" alt="Sofia Alicio">
                        </a>
                    </li>
                </ul>
                <div class="emms__companies__divisor"></div>
                <h3>MEDIA PARTNERS STARTERS</h3>
                <ul class="emms__companies__list emms__fade-in" id="mediaPartenersStarters">
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084414063Z501057.png" alt="MIMEC">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T205317122Z626414.png" alt="cace">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T205335654Z858571.png" alt="asocdeinternetmx">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084514301Z535073.png" alt="Cámara dee Comercio de Córdoba">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T205350529Z876765.png" alt="capece">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084538115Z587466.png" alt="Growby">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T205403774Z744976.png" alt="capace">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084559291Z231911.png" alt="Del querer al hacer">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230511T170419656Z171075.png" alt="latinspots">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T204938961Z225171.png" alt="itsitio">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084624476Z612615.png" alt="IT Ahora">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230512T214314908Z436918.png" alt="americaretail">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230512T214500947Z066854.png" alt="amvo">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084738367Z487749.png" alt="Emprendedores News">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230403T082454058Z907380.png" alt="Círculo Empresarial">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085247285Z879670.png" alt="Grandes Pymes">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230403T082528464Z053843.png" alt="CEVEC">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230403T082602950Z164011.png" alt="El PUblicista">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T205445654Z602554.png" alt="storydots">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230403T082639158Z504938.png" alt="Soy Emprendedora">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T204901440Z277001.png" alt="somospymes">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T205003279Z078126.png" alt="insiderlatam">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230512T214519193Z956742.png" alt="cooltabs">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230403T082713061Z595231.png" alt="Mujeres en Tecnología">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T204916156Z046499.png" alt="xcons">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T210318967Z767206.png" alt="facturante">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085308334Z486520.png" alt="Mundo Contact">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230317T122926188Z978476.png" alt="Ultravioleta">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085328868Z516303.png" alt="Marketing al Día">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230512T125327905Z524756.png" alt="vivimarketing">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085352836Z665289.png" alt="Bulb">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230404T082523036Z971020.png" alt="Conference Management">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230512T214633379Z403914.png" alt="universidad-marco-fidel-suarez">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T205552598Z197590.png" alt="tiipe">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085442178Z436410.png" alt="Mi Pyme no Para">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T205639046Z688486.png" alt="ruculadigital">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085507776Z867777.png" alt="Entre Emprenedores Workshop">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230510T204655251Z156678.png" alt="peruretail">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230519T175406528Z797830.png" alt="rampa">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085528208Z709702.png" alt="Disruptivo TV">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085719765Z754128.png" alt="Caro Siri">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085736043Z513096.png" alt="SED Emprendedor">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085811273Z535760.png" alt="AD Media Rock">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085842074Z226329.png" alt="We Connect">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085855731Z953447.png" alt="Flor Lamas">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T085912200Z517799.png" alt="Somos Branders OK">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T090009023Z036658.png" alt="Power Hub">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T090023070Z980079.png" alt="Mamita Power">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230418T132853045Z569519.png" alt="Cliengo">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T205701244Z243886.png" alt="prodequa">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T205743902Z853530.png" alt="ecodiem">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T210029264Z553941.png" alt="aulacm">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T210128785Z412476.png" alt="educacionit">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230515T210142433Z042366.png" alt="brainsted">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230517T170449569Z704590.png" alt="billowshop">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230524T164023250Z721053.webp" alt="radiodigitalamerica">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230329T111651394Z339517.png" alt="Marketing digital experience">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084443405Z219766.png" alt="Cámara Argentina de Fintech">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230329T111731344Z455405.png" alt="Ignacio Santiago">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230329T111747496Z898195.png" alt="Epico">
                    </li>
                    <li class="emms__companies__list__item">
                        <img src="src/img/sponsors/20230331T084320642Z732877.png" alt="Micaela Sabja">
                    </li>
                </ul>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>


    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/dateCounter.js"></script>
    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/homeEcommerce.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once('././src/components/intellInput.php'); ?>


</body>

</html>
