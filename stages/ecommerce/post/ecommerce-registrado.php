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
            hiddenOrShowUserUI
        } from './src/<?= VERSION ?>/js/user.js';
        hiddenOrShowUserUI('digital-trends');
    </script>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado emms__ecommerce-logueado--post">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-ecommerce.png" alt="Emms Ecommerce 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/registrado">home</a></li>
                    <li class="emms__header__nav__menu__dropdown"><a href="#" class="active">e-commerce</a>
                        <ul class="emms__header__nav__submenu">
                            <li><a href="#agenda">AGENDA</a></li>
                            <li><a href="#aprende-con-doppler">APRENDE CON DOPPLER</a></li>
                        </ul>
                    </li>
                    <li><a href="/digital-trends">digital trends</a></li>
                    <li><a href="/sponsors">contenido exclusivo</a></li>
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

        <!-- Hero -->
        <section class="emms__hero-registration--registered emms__hero-registration--registered--post">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">Revive las Conferencias del EMMS E-commerce 2023</h1>
                <p class="emms__fade-in">El 16 y 17 de mayo se reunieron los máximos referentes del Comercio Electrónico. Allí compartieron todas las tendencias y técnicas para vender más. </br>Descubre todo el contenido que compartieron en sus ponencias.</p>
            </div>
            <!-- List -->
            <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
                <?php
                require_once('./utils/DB.php');
                $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $speakers = $db->getAllSpeakers();
                foreach ($speakers as $speaker) : ?>
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
                                <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
                <?php
                require_once('./utils/DB.php');
                $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $speakers = $db->getAllSpeakers();
                foreach ($speakers as $speaker) : ?>
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
                                <a href="../../../speaker-interna?slug=<?= $speaker['slug'] ?>" target="_blank" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- End list -->
        </section>

        <!-- Premium content -->
        <section class="emms__premium-content">
            <div class="emms__background-a"></div>
            <div class="emms__container--lg">
                <div class="emms__premium-content__text emms__fade-in">
                    <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                    <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu E-commerce.</p>
                    <a href="./sponsors-registrado" class="emms__cta emms__fade-in">ACCEDE AQUÍ</a>
                </div>
                <div class="emms__premium-content__picture emms__fade-in">
                    <img src="src/img/download--locked.png" alt="Contenido Premium">
                </div>
            </div>
        </section>

        <!-- Separator -->
        <div class="emms__separator"></div>

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


        <!-- Central Video -->
        <section class="emms__centralvideo eventHiddenElements">
            <div class="emms__background-b"></div>
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>¡No dejes de aprender!</br> Vuelve el EMMS Digital Trends</h2>
                    <p>Si quieres descubrir aún más <strong>tendencias en Marketing Digital</strong> para potenciar tu negocio, en <strong>octubre</strong> volvemos con muchas más conferencias y contenido exclusivo en el evento en español más elegido cada año por miles de profesionales.</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/EmmsDigitalTrands.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in">
                    <a href="./digital-trends" class="emms__cta">MÁS INFORMACIÓN</a>
                    <small><i>¿Tienes dudas sobre el EMMS 2023?</i> Haz <a href="./registrado#preguntas-frecuentes" target="_blank">clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>
            </div>
        </section>

        <!-- Doppler Banner -->
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>
    <script src="src/<?= VERSION ?>/js/certificateModal.js"></script>

</body>

</html>
