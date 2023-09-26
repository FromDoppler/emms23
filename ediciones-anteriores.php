<?php
require_once('././src/components/cacheSettings.php');
require_once('././config.php');
require_once('./utils/DB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-home.php'); ?>
    <?php include_once('././src/components/head.php'); ?>

    <script src='./src/<?= VERSION ?>/js/vendors/socket.io.min.js?version=<?= VERSION ?>'></script>
    <script>
        const socket = io("wss://<?= URL_REFRESH ?>", {
            path: "/<?= PATH_REFRESH ?>/socket.io"
        });
        socket.on("state", (args) => {
            location.reload();
        });
    </script>
    <script type="module">
        import {
            isUserLogged,
            getUrlWithParams
        } from './src/<?= VERSION ?>/js/common/index.js';

        if (isUserLogged()) {
            window.location.href = getUrlWithParams('/ediciones-anteriores-registrado');
        }
    </script>
</head>

<body class="emms__previous-editions">

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
                    <li><a href="/sponsors">biblioteca de recursos</a></li>
                    <li><a href="#" class="active">ediciones anteriores</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2Findex.php', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2Findex.php&text=Llega%20una%20nueva%20edici%C3%B3n%20del%20EMMS.%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20Marketing%20Digital.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20plaza!', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2Findex.php&title=Llega%20una%20nueva%20edici%C3%B3n%20del%20EMMS.%20S%C3%BAmate%20ahora%20al%20evento%20que%20te%20acercar%C3%A1%20a%20los%20mayores%20expertos%20internacionales%20en%20Marketing%20Digital.%20Es%20gratis%20y%20online.%20%C2%A1Reserva%20tu%20plaza!', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__previous-editions__hero">
            <div class="emms__container--md">
                <h1 class="emms__fade-top">¡Revive las ediciones anteriores!</h1>
                <p class="emms__fade-in">¿Te has perdido algún EMMS o quieres revivirlo? Disfruta gratis de todas las conferencias y potencia tu negocio junto a los líderes del Marketing Digital.</p>
            </div>
        </section>

        <!-- Editions list -->
        <section class="emms__previous-editions__list">
            <div class="emms__container--md">
                <ul class="emms__previous-editions__list__container">
                    <li class="emms__previous-editions__list__item emms__previous-editions__list__item--lg emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2022.png" alt="EMMS 2021">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2022</h3>
                                <p>A lo largo de 3 días, 21 speakers internacionales de las compañías más vanguardistas del mercado revolucionaron el evento de Marketing Digital más esperado del año. ¡Revívelo y descubre por qué 55.000 personas no quisieron perdérselo!</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__previous-editions__list__item--lg emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2021.png" alt="EMMS 2021">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2021</h3>
                                <p>Los líderes de la industria se reunieron para dar respuesta y soluciones a los desafíos actuales.
                                    Revive esta edición especial, pensada para todos aquellos que toman decisiones de negocio en su día a día y llevan sus empresas al próximo nivel.
                                </p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2020.png" alt="EMMS 2020">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2020</h3>
                                <p>A lo largo de 5 días, 18 oradores de primer nivel compartieron su conocimiento sobre Marketing Digital enfocado en 5 industrias clave. ¡Las sesiones virtuales de Networking fueron el complemento clave!</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2019.png" alt="EMMS 2019">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2019</h3>
                                <p>Las temáticas más votadas por el público y los especialistas que están cambiando el Marketing Digital en el mundo. ¡Revive la jornada que se convirtió en el evento online del año!</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2018.png" alt="EMMS 2018">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2018</h3>
                                <p>Las conferencias en inglés con traducción en simultáneo marcaron un antes y un después para los eventos de Marketing del mercado hispano. Hubo speakers de primer nivel y miles de asistentes.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2017.png" alt="EMMS 2017">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2017</h3>
                                <p>¡La décima edición tuvo récord de registros! Fueron 8 conferencias organizadas en nivel inicial y avanzado para que cada uno pudiera capacitarse en base a su experiencia y necesidades.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2016.png" alt="EMMS 2016">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2016</h3>
                                <p>Se sumaron novedosos formatos como charlas motivacionales, entrevistas a expertos, debates en vivo y más. Esta vez fue la audiencia quien eligió de qué manera aprender.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2015.png" alt="EMMS 2015">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2015</h3>
                                <p>Como cada edición, el EMMS se renovó. Las conferencias se convirtieron en un evento de dos días con 10 oradores destacados dentro de 2 temáticas: motivación y acción.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2014.png" alt="EMMS 2014">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2014</h3>
                                <p>El evento se transformó volviéndose 100% online, internacional y gratis. Con una duración de 10 horas ininterrumpidas, 10 increíbles speakers y más de 10.000 asistentes.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2013.png" alt="EMMS 2013">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2013</h3>
                                <p>Por primera vez el evento viajó por 5 países: Ecuador, España, República Dominicana, México y Argentina. Los influencers del sector se lucieron con charlas magníficas.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2012.png" alt="EMMS 2012">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2012</h3>
                                <p>Inspirado en el “fin del mundo”, volvió el EMMS para salvar a aquellos que no pensaban actualizarse con las últimas tendencias del Marketing. Más de 2.000 participantes.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2011.png" alt="EMMS 2011">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2011</h3>
                                <p>El evento más relevante de Marketing Online llegó a México. Se discutieron temas como el Mobile Marketing, tendencias del mercado y se inauguró el panel de casos de éxito.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2010.png" alt="EMMS 2010">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2010</h3>
                                <p>Los asistentes aprendieron sobre el análisis de Métricas, Social Email Marketing, Diseño y Conversión, en el reconocido seminario del Email Marketing Made Simple.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a data-target="modalRegister2" data-toggle="emms__register-modal">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2009.png" alt="EMMS 2009">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2009</h3>
                                <p>Solo 500 personas tuvieron la posibilidad de vivir este evento en Buenos Aires, Argentina. Tendencias en Social Media, Content Marketing, SEO y mucho más.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>




        <!-- Register modal -->
        <div id="modalRegister2" class="emms__register-modal">
            <div class="emms__register-modal__window">
                <!-- Form -->
                <form class="emms__form" id="editionsForm" novalidate autocomplete="off">
                    <h3>Accede a las ediciones anteriores</h3>
                    <h4>Regístrate aquí para revivirlas 🙂</h4>
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
                                    <option value="Especialista y/o consultor en Marketing">Especialista y/o consultor en Marketing</option>
                                    <option value="Digital">Digital</option>
                                    <option value="Asistente de Marketing / Comunicación / Ventas">Asistente de Marketing / Comunicación / Ventas</option>
                                    <option value="Ejecutivo/a de Cuentas">Ejecutivo/a de Cuentas</option>
                                    <option value="Redactor/a de contenidos / Copywriter">Redactor/a de contenidos / Copywriter</option>
                                    <option value="Diseñador/a Gráfico / Web">Diseñador/a Gráfico / Web</option>
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
                        <button class="emms__cta" id="register-button" type="button"><span class="button__text">ACCEDE AHORA</span></button>
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


        <!-- Central Video -->
        <section class="emms__centralvideo emms__centralvideo--dark">
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Se acerca una nueva edición del EMMS…</h2>
                    <p>¡Vuelve el <strong>EMMS Digital Trends</strong>! Se vienen nuevas Conferencias, Entrevistas, Casos de Éxito, Workshops prácticos, Networking ¡y muchas nuevas sorpresas!</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <video src="src/img/EmmsDigitalTrends.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in">
                    <a href="./digital-trends" class="emms__cta">REGÍSTRATE GRATIS</a>
                    <small><i>¿Tienes dudas sobre el EMMS 2023?</i> Haz <a href="./registrado#preguntas-frecuentes" target="_blank">clic aquí</a> y encuentra las preguntas más frecuentes sobre el evento.</small>
                </div>
            </div>
            <div class="emms__centralvideo__bottom emms__fade-in">
                <div class="emms__centralvideo__bottom__container">
                    <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
                    <p>INTELIGENCIA ARTIFICIAL >> MARKETING AUTOMATION >> SOCIAL MEDIA >> EMAIL MARKETING >> CRO >> SEO >> SOCIAL ADS >> CONTENT MARKETING >> GOOGLE ADS >> RETARGETING >></p>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
    <script src="src/<?= VERSION ?>/js/previousEditions.js" type="module"></script>
    <script src="src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once('././src/components/intellInput.php'); ?>



</body>

</html>
