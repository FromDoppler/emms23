<?php
require_once('./config.php');
require_once('./utils/DB.php');


if (!isset($_GET['slug']) or (trim($_GET['slug']) === '')) {
    header('Location: ' . 'index');
    exit;
}
$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$speaker = $db->getSpeakerBySlug($_GET['slug'])[0];
$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-speaker-interna.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado emms__ecommerce-logueado--during">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="/"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Fspeaker-interna', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Fspeaker-interna%26slug%3D<?= $speaker['slug'] ?>&text=<?= $speaker['meta_twitter'] ?>', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Fspeaker-interna&title=textodetw', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__hero-conference emms__hero-conference--bio">
            <div class="emms__container--lg">
                <h1 class="emms__fade-in"><?= $speaker['description'] ?></h1>
                <div class="emms__hero-conference__video emms__fade-in">
                    <!--Video -->
                    <div class="emms__cropper-cont-16-9 dp--none" id="speakerVideo">
                        <div class="emms__cropper-cont ">
                            <div class="emms__cropper-cont-interno">
                                <iframe src="https://www.youtube.com/embed/<?= $speaker['youtube'] ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div id="formContainer" class="dp--none">
                        <!-- Registro con Form -->
                        <form class="emms__form emms__fade-in eventHiddenElements" novalidate autocomplete="off" id="speakerForm">
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
                                            Acepto recibir promociones de Doppler</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="emms__form__btn">
                                <button class="emms__cta" id="register-button" type="button"><span class="button__text">REGÍSTRATE GRATIS</span></button>
                            </div>
                            <div class="emms__form__legal">
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
                        <!-- FIN Registro con Form -->
                    </div>

                </div>
                <div class="emms__hero-conference__aside emms__fade-in">
                    <h2><?= $speaker['name'] ?></h2>
                    <p><?= $speaker['bio'] ?></p>
                    <ul>
                        <?php if ($speaker['sm_linkedin']) : ?>
                            <li><a href="<?= $speaker['sm_linkedin'] ?>"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                        <?php endif; ?>
                        <?php if ($speaker['sm_twitter']) : ?>
                            <li><a href="<?= $speaker['sm_twitter'] ?>"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <p class="emms__hero-conference__certificate emms__fade-in">Descarga <a data-target="certificateModal" data-toggle="emms__certificate-modal">aquí</a> tu Certificado de Asistencia y compártelo en Redes Sociales usando el Hashtag #EMMSECOMMERCE :)</p>
            </div>
        </section>

        <!-- Certificate modal -->
        <div id="certificateModal" class="emms__certificate-modal">
            <div class="emms__certificate-modal__window">
                <h3>¡Estás a un paso de descargar tu Certificado de Asistencia!</h3>
                <p>Ingresa tu nombre y apellido para descargarlo ahora 🙂</p>
                <form id="certificateForm">
                    <input type="text" placeholder="Nombre y apellido" name="fullname">
                    <span class="certificateError">¡Ouch! Debes ingresar al menos 2 caracteres.</span>
                    <a class="emms__cta" type="button" id="certificateCta">QUIERO DESCARGARLO</a>
                    <button class="emms__certificate-modal__window__close" data-dismiss="emms__certificate-modal"></button>
                </form>
            </div>
        </div>

        <!-- Premium content -->
        <section class="emms__premium-content">
            <div class="emms__background-a"></div>
            <div class="emms__container--lg">
                <div class="emms__premium-content__text emms__fade-in">
                    <h2>Desbloquea Contenido Premium ¡gratis! </h2>
                    <p>Descubre <strong>recursos descargables, herramientas y conferencias on-demand</strong> que te traen nuestros aliados para que puedas ponerlos en práctica y potenciar tu Tienda Online.</p>
                    <a href="./sponsors-registrado" class="emms__cta emms__fade-in">DESCÚBRELO AQUÍ</a>
                </div>
                <div class="emms__premium-content__picture emms__fade-in">
                    <img src="src/img/download--locked.png" alt="Contenido Premium">
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
    <script src="src/<?= VERSION ?>/js/speakersInterna.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/common/certificate.js"></script>

</body>

</html>
