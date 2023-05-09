<?php
require_once('././config.php');
?>

<?php
require_once('./utils/DB.php');
$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$settings_phase = $db->getCurrentPhase('ecommerce')[0]; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__digitaltrends emms__digitaltrends-logueado">
    <?php include_once('././src/components/gtm.php'); ?>

    <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['transition'] === "live-on")) : ?>
        <!-- Hellobar -->
        <div class="emms__hellobar">
            <div class="emms__hellobar__container emms__fade-in">
                <p><strong>¡YA COMENZÓ EL EMMS E-COMMERCE!</strong></p>
                <a href="./ecommerce">SÚMATE AHORA</a>
            </div>
        </div>
    <?php endif; ?>


    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo emms__header__logo--ecommerce">
                <a href="/"><img src="src/img/logos/logo-emms-digitaltrends.png" alt="Digital Trends 2023"></a>
            </div>
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
        <section class="emms__hero-registration--registered">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">¡Ya eres parte del EMMS Digital Trends 2023!</h1>
                <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['transition'] === "live-on")) : ?>
                    <p class="emms__fade-in">Mantente pendiente de tu casilla de correo y descubrirás todas las novedades del evento. Mientras tanto, te invitamos al <a href="./ecommerce">EMMS E-commerce 2023</a> ¡que ya ha comenzado!</p>
                <?php else : ?>
                    <p>Texto cuando el ecommerce no esta en vivo (transition y post)</p>
                <?php endif; ?>
            </div>
        </section>

        <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['transition'] === "live-on")) : ?>
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
        <?php endif; ?>

        <!-- Doppler Banner -->
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>


    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/calendarBio.js"></script>

</body>

</html>
