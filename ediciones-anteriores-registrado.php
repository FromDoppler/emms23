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

        if (!isUserLogged()) {
            window.location.href = getUrlWithParams('/ediciones-anteriores');
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
            <?php if ($isLive) : ?>
                <div class="emms__header__live">
                    <p>¡ESTAMOS EN VIVO EN EMMS E-COMMERCE!</p>
                </div>
            <?php endif ?>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="/">home</a></li>
                    <li><a href="./ecommerce">e-commerce</a></li>
                    <li><a href="./digital-trends">digital trends</a></li>
                    <li><a href="/sponsors">contenido exclusivo</a></li>
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
                <h1 class="emms__fade-top">Revive las ediciones anteriores</h1>
                <p class="emms__fade-in">¿Te has perdido alguno de nuestros eventos o quieres revivirlo? Disfruta gratis todas las conferencias y potencia tu negocio junto a los líderes del Marketing Digital.</p>
            </div>
        </section>

        <!-- Editions list -->
        <section class="emms__previous-editions__list">
            <div class="emms__container--md">
                <ul class="emms__previous-editions__list__container">
                    <li class="emms__previous-editions__list__item emms__previous-editions__list__item--lg emms__fade-in">
                        <a href="https://youtube.com/playlist?list=PLHE_SVtQOB8rm4R9Dn55TfQSABmWQoaRK" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8oeQSWPozYXCwdC9PKRNPiM" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8pcO6n-OHDedWgmicdFuj_p" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8qoW8HGYDWUF1V6c0taJGJk" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8qJGZdZ8UiUZA9N0BqQ_ePf" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8rVbcM84J2HdtU9Ko1N2wOW" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8olvfTQWIY-K12xmfh-083T" target="_blank">
                            <div class="emms__previous-editions__list__item__image">
                                <img src="src/img/editions/emms2016.png" alt="EMMS 2016">
                            </div>
                            <div class="emms__previous-editions__list__item__description">
                                <h3>EMMS 2016</h3>
                                <p>Se sumaron novedosos formatos como charlas motivacionales, entrevistas a expertos,  debates en vivo y más. Esta vez fue la audiencia quien eligió de qué manera aprender.</p>
                                <span>Revive esta edición</span>
                            </div>
                        </a>
                    </li>
                    <li class="emms__previous-editions__list__item emms__fade-in">
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8rSRLFPeeXwpbFwXglMAjw6" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8rfXIJu1cFWY8LjPe6wQQ4b" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8qr7C4nts3AwCXRP3fPi1y1" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8pFFK1-Tg8o1uDOWKUGBaoM" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8pCjMuMVOwrataaoQUyaFvo" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8oQe0h6OLhb1QOwMHSfoI3P" target="_blank">
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
                        <a href="https://www.youtube.com/playlist?list=PLHE_SVtQOB8qZykZGtv66ITP3zxHPUhfV" target="_blank">
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


        <!-- Doppler Academy Banner -->
        <?php include_once('././src/components/doppler-academy-banner.php'); ?>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>



</body>

</html>
