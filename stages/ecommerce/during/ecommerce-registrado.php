<?php
require_once('././config.php');
?>

<?php
require_once('./utils/DB.php');
$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$settings_phase = $db->getCurrentPhase('ecommerce')[0];
$db->close(); ?>

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

<body class="emms__ecommerce emms__ecommerce-logueado emms__ecommerce-logueado--during">
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
                    <li><a href="/sponsors-registrado">contenido exclusivo</a></li>
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
        <section class="emms__hero-conference emms__hero-conference--chat">
            <div class="emms__container--lg">
                <?php if (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transition'] === "live-on")) : ?>
                    <h1 class="emms__fade-in">EN VIVO</h1>
                    <div class="emms__hero-conference__video emms__fade-in">
                        <div class="emms__cropper-cont-16-9">
                            <div class="emms__cropper-cont ">
                                <div class="emms__cropper-cont-interno">
                                    <iframe src="https://www.youtube.com/embed/<?= $duringDaysArray[$dayDuring]['youtube'] ?>?rel=0&autoplay=1&mute=1&enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <small>Recuerda activar el sonido y configurar la calidad de reproducción en <strong>720p HD</strong> ⚙️</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__fade-in emms__hero-conference__video--chat">
                        <iframe src="https://www.youtube.com/live_chat?v=<?= $duringDaysArray[$dayDuring]['youtube'] ?>&embed_domain=<?= $_SERVER['HTTP_HOST'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <p class="emms__hero-conference__certificate emms__fade-in">Descarga <a data-target="certificateModal" data-toggle="emms__certificate-modal">aquí</a> tu Certificado de Asistencia y compártelo en Redes Sociales usando el Hashtag #EMMSECOMMERCE :)</p>
                <?php elseif (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transmission'] === "twitch")) : ?>
                    <iframe src="https://player.twitch.tv/?channel=<?= $duringDaysArray[$dayDuring]['twitch'] ?>&parent=<?= $_SERVER['HTTP_HOST'] ?>">
                    </iframe>
                <?php elseif (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transmission'] === "twitch-migrate")) : ?>
                    //TODO: Agregar placa de migramos a twitch
                    <h1>Placa migramos a twitch</h1>
                <?php elseif (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transmission'] === "technical-problems")) : ?>
                    //TODO: Agregar placa de problemas tecnicos
                    <h1>Placa placa de problemas tecnicos</h1>
                <?php elseif (($settings_phase['event'] === "ecommerce") && ($settings_phase['during'] === 1) && ($settings_phase['transition'] === "live-off")) : ?>
                    <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in">
                        <h2>Prepárate, ¡se viene el día 2 del EMMS E-commerce 2023!</h2>
                        <small>Recuerda que podrás acceder a todas las grabaciones de las Conferencias una vez finalizado el evento desde la <a href="#agenda">Agenda</a>.</small>
                    </div>
                    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in">
                        <p>Mientras te preparas para el último día, accede a todo el contenido exclusivo que hemos preparado para ti: E-books gratuitos, cápsulas audiovisuales, guías, plantillas, beneficios, descuentos ¡y mucho más!</p>
                        <a class="emms__cta" href="/sponsors-registrado">ACCEDE AHORA</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Certificate modal -->
        <div id="certificateModal" class="emms__certificate-modal">
            <div class="emms__certificate-modal__window">
                <h3>¡Estás a un paso de descargar tu Certificado de Asistencia!</h3>
                <p>Ingresa tu nombre y apellido para descargarlo ahora 🙂</p>
                <input type="text" placeholder="Nombre y apellido">
                <span>Debes ingresar tu nombre y apellido</span>
                <a href="" class="emms__cta">QUIERO DESCARGARLO</a>
                <button class="emms__certificate-modal__window__close" data-dismiss="emms__certificate-modal"></button>
            </div>
        </div>

        <!-- Premium content -->
        <section class="emms__premium-content">
            <div class="emms__background-a"></div>
            <div class="emms__container--lg">
                <div class="emms__premium-content__text emms__fade-in">
                    <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                    <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu Tienda Online.</p>
                    <a href="./sponsors-registrado" class="emms__cta emms__fade-in">ACCEDE AHORA</a>
                </div>
                <div class="emms__premium-content__picture emms__fade-in">
                    <img src="src/img/download--locked.png" alt="Contenido Premium">
                </div>
            </div>
        </section>

        <!-- Separator -->
        <div class="emms__separator"></div>

        <!-- Calendar -->
        <section class="emms__calendar" id="agenda">
            <div class="emms__container--lg">
                <div class="emms__calendar__title emms__fade-in">
                    <h2>Agenda EMMS E-commerce 2023</h2>
                </div>
                <!-- Speakers -->
                <?php include('./src/components/speakers.php') ?>
                <!-- End list -->
                <div class="emms__calendar__bottom emms__fade-in">
                    <p>Recuerda que al finalizar el evento podrás acceder a los videos de todas las conferencias.</p>
                </div>
            </div>
            <div class="emms__background-b"></div>
            <div class="emms__background-c"></div>
        </section>

        <!-- Separator -->
        <div class="emms__separator eventHiddenElements"></div>


        <!-- Central Video - Show only if the user is not registered in DT -->
        <section class="emms__centralvideo eventHiddenElements">
            <div class="emms__background-b"></div>
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>¡No dejes de aprender! Vuelve el EMMS Digital Trends</h2>
                    <p>Si quieres descubrir aún más <strong>tendencias en Marketing Digital</strong> para potenciar tu negocio, en <strong>octubre</strong> volvemos con más conferencias, contenido exclusivo y muchas más sorpresas en el evento en español más elegido cada año por miles de profesionales.</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/EmmsDigitalTrends.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in">
                    <a href="#registro" class="emms__cta">MÁS INFORMACIÓN</a>
                    <small><i>¿Tienes dudas sobre el EMMS 2023?</i> Haz <a href="./home.php#preguntas-frecuentes" target="_blank">click aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
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
    <script src="src/<?= VERSION ?>/js/date.js"></script>



</body>

</html>
