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
                    <li><a href="#" class="active">digital trends</a>
                    </li>
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
        <section class="emms__hero-registration--registered">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">¡Ya eres parte del EMMS Digital Trends 2023!</h1>
                <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transition'] === "live-on")) : ?>
                    <p class="emms__fade-in">Mantente pendiente de tu casilla de correo y descubrirás todas las novedades del evento. Mientras tanto, te invitamos al <a href="./ecommerce">EMMS E-commerce 2023</a> ¡que ya ha comenzado!</p>
                <?php else : ?>
                    <p>Mantente pendiente de tu casilla de correo y descubrirás todas las novedades del evento.</p>
                <?php endif; ?>
            </div>
        </section>


        <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1)) : ?>
            <!-- Go live -->
            <section class="emms__golive-banner">
                <div class="emms__background-a"></div>
                <div class="emms__container--md">
                    <div class="emms__golive-banner__picture emms__fade-in">
                        <img src="src/img/mic.png" alt="En vivo">
                    </div>
                    <div class="emms__golive-banner__text emms__fade-in">
                        <span>YA COMENZÓ</span>
                        <h2>Súmate ahora al EMMS E-commerce</h2>
                        <p>Descubre la Agenda y las temáticas que estamos abordando en <strong>el mayor evento para Tiendas Online</strong>. Ingresa ahora y aprovecha todas las Conferencias, Entrevistas y Casos de Éxito que tenemos para ti.</p>
                        <a href="/ecommerce" class="emms__cta">ACCEDE GRATIS</a>
                    </div>
                </div>
            </section>
        <?php elseif (($settings_phase['event'] === "ecommerce") && ($settings_phase['post'] === 1)) : ?>
            <!-- Go live -->
            <section class="emms__golive-banner eventHiddenElements">
                <div class="emms__background-a"></div>
                <div class="emms__container--md">
                    <div class="emms__golive-banner__picture emms__fade-in">
                        <img src="src/img/mic.png" alt="En vivo">
                    </div>
                    <div class="emms__golive-banner__text emms__fade-in">
                        <h2>Descubre el EMMS E-commerce</h2>
                        <p>Ahora también podrás inspirarte y aprender con un evento exclusivo pensado para tu Tienda Online. Ingresa ahora y aprovecha todas las Conferencias, Entrevistas y Casos de Éxito que tenemos para ti.</p>
                        <a href="/ecommerce" class="emms__cta">ACCEDE GRATIS</a>
                    </div>
                </div>
            </section>
            <!-- Separator -->
            <div class="emms__separator eventHiddenElements"></div>
            <!-- Premium content -->
            <section class="emms__premium-content eventShowElements">
                <div class="emms__container--lg">
                    <div class="emms__premium-content__text emms__fade-in">
                        <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                        <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu negocio.</p>
                        <a href="./sponsors" class="emms__cta emms__fade-in">ACCEDE AHORA</a>
                    </div>
                    <div class="emms__premium-content__picture emms__fade-in">
                        <img src="src/img/download--locked.png" alt="Contenido Premium">
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <!-- Doppler Banner -->
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>

</body>

</html>
