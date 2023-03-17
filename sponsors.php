<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__sponsors">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="./index.php"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="./index.php">home</a></li>
                    <li><a href="#" class="active">contenido exclusivo</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <!-- Hero -->
        <section class="emms__sponsors__hero">
            <div class="emms__sponsors__hero__title emms__fade-top">
                <h1><em>Herramientas gratuitas para potenciar tu negocio</em> Contenido Premium para registrados al EMMS E-commerce 2023</h1>
                <p>🔒 Desbloquea ahora todas las herramientas y recursos que nuestros aliados han preparado para que puedas optimizar tu Tienda Online.</p>
                <a href="" class="emms__cta emms__fade-in">REGÍSTRATE GRATIS AHORA</a>
            </div>
        </section>


        <!-- Sponsors List -->
        <section class="emms__sponsors__list">
            <div class="emms__container--lg">
                <div class="emms__sponsors__list__title">
                    <h2 class="emms__fade-in">Aquí encontrarás...</h2>
                    <ul class="emms__fade-in">
                        <li>E-books</li>
                        <li>Conferencias</li>
                        <li>Plantillas y guías</li>
                        <li>Beneficios exclusivos</li>
                    </ul>
                </div>
                <ul class="emms__sponsors__list__content emms__fade-in">
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a data-target="modalRegister" data-toggle="emms__register-modal">Acceder →</a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Register modal -->
        <div id="modalRegister" class="emms__register-modal">
            <div class="emms__register-modal__window">
                <!-- Form -->
                <form class="emms__form" id="ecommerceForm" novalidate autocomplete="off">
                    <h4>Regístrate gratis para acceder a este contenido 🙂</h4>
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
                        <button class="emms__cta" id="register-button" type="button"><span class="button__text">RESERVA TU LUGAR</span></button>
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
                <button class="emms__register-modal__window__close" data-dismiss="emms__register-modal"></button>
            </div>
        </div>

        <!-- Doppler Academy Banner -->
        <section class="emms__doppleracademybanner">
            <div class="emms__container--lg">
                <div class="emms__doppleracademybanner__image emms__fade-in">
                    <img src="src/img/woman-picture-b.png" alt="Doppler">
                </div>
                <div class="emms__doppleracademybanner__description emms__fade-in">
                    <h2>Aprende con Doppler Academy</h2>
                    <p>Doppler es la herramienta líder en Marketing Automation en español. Además de ayudar al crecimiento de tu negocio, formamos a profesionales de Marketing a lo largo de todo el mundo de forma <strong>100% gratuita</strong>.</p>
                    <p><strong>¿Quieres capacitarte gratis?</strong> ¡Esto te va a interesar! Descubre <strong>Doppler Digital Bootcamp</strong> y certifícate ahora en Automation Marketing.</p>
                    <ul>
                        <li>Gratis</li>
                        <li>Online y a tu ritmo</li>
                        <li>20 lecciones de 15 minutos</li>
                        <li>Clases teóricas y prácticas</li>
                    </ul>
                    <a href="https://academy.fromdoppler.com/bootcamp/?utm_source=emmsecom&utm_medium=goemms&utm_campaign=et-contenidoexclusivo-noregistrado-emmsecom-23" target="_blank" class="emms__cta emms__fade-in">ACCEDE AHORA</a>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/sponsors.js"></script>
    <script src="src/<?= VERSION ?>/js/homeEcommerce.js" type="module"></script>

</body>

</html>
