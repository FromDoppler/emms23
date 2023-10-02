<?php
require_once('././config.php');
require_once('./utils/DB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-home.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
    <script type="module">
        import {
            isUserLogged,
            getUrlWithParams
        } from './src/<?= VERSION ?>/js/common/index.js';

        if (isUserLogged()) {
            window.location.href = getUrlWithParams('/sponsors-registrado');
        }
    </script>
</head>

<body class="emms__sponsors">
    <?php include_once('././src/components/gtm.php'); ?>
    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="/"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/">home</a></li>
                    <li><a href="./ecommerce">e-commerce</a></li>
                    <li><a href="./digital-trends">digital trends</a></li>
                    <li><a href="#" class="active">biblioteca de recursos</a></li>
                    <li><a href="ediciones-anteriores">ediciones anteriores</a></li>
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
                <a class="emms__cta emms__fade-in" data-target="modalRegister" data-toggle="emms__register-modal">REGÍSTRATE GRATIS AHORA</a>
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
                    <?php
                    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $sponsors = $db->getSponsorsCards('SPONSOR');
                    foreach ($sponsors as $sponsor) :
                    ?>
                        <li class="emms__sponsors__list__item">
                            <div class="emms__sponsors__list__item__logo">
                                <img src="./adm23/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                            </div>
                            <h3><?= $sponsor['title'] ?></h3>
                            <p><?= $sponsor['description_card'] ?></p>
                            <a data-target="modalRegister" data-toggle="emms__register-modal" slug=<?= $sponsor['slug'] ?>>Accede →</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- Register modal -->
        <div id="modalRegister" class="emms__register-modal">
            <div class="emms__register-modal__window">
                <!-- Form -->
                <form class="emms__form" id="sponsorsForm" novalidate autocomplete="off">
                    <h3>Regístrate aquí para acceder 🙂</h3>
                    <h4>Regístrate aquí para desbloquear la Biblioteca de Recursos gratuitos para asistentes del EMMS. Además, al hacerlo podrás acceder a todas las charlas de tus ediciones preferidas, enterarte de los próximos eventos, acceder a ellos y ¡mucho más!</h4>
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
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/sponsors.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once('././src/components/intellInput.php'); ?>


</body>

</html>
