<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__home">

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="./index.php"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul>
                    <li><a href="./home.php" class="active">home</a></li>
                    <li><a href="">ecommerce</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Share -->
    <div class="emms__share">
        <a id="btn-share" class="emms__share__open-list"><img src="src/img/icons/icon-share.svg" alt="Share"></a>
        <ul id="list-share" class="emms__share__list">
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgoemms.com%2F', 'Facebook', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Facebook-w.svg" alt="Facebook">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?url=https%3A%2F%2Fgoemms.com%2F&text=', 'Twitter', 'toolbar=0, status=0, width=550, height=350');">
                    <img src="src/img/Twitter-w.svg" alt="Twitter">
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" onclick="window.open ('http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fgoemms.com%2F&title=', 'Linkedin', 'toolbar=0, status=0, width=550, height=550');">
                    <img src="src/img/LinkedIn-w.svg" alt="LinkedIn">
                </a>
            </li>
        </ul>
    </div>

    <main>

        <!-- Hero -->
        <section class="emms__home__hero">
            <div class="emms__home__hero__title emms__fade-top">
                <h1><em>EL EVENTO DE MARKETING DIGITAL QUE REVOLUCIONA LA INDUSTRIA</em> Vuelve el EMMS recargado</h1>
                <h2>EVENTOS ONLINE EN UN MISMO LUGAR</h2>
                <p>Luego de 15 ediciones, en 2023 podrás disfrutar de diferentes eventos online, con speakers internacionales de renombre, 100% gratuito y online.</p>
            </div>
            <!-- Event cards -->
            <div class="emms__eventCards">
                <div class="emms__container--lg">
                    <ul class="emms__eventCards__list emms__eventCards__list--dk emms__fade-in">
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-ecommerce.png" alt="Image Ecommerce">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p><span>20</span>MAY</p>
                                </div>
                                <h3>EMMS ECOMMERCE</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <a href="">Regístrate gratis →</a>
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-fintech.png" alt="Image Fintech">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>AGO</p>
                                </div>
                                <h3>EMMS FINTECH</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <a href="">Acceder →</a>
                                    <p class="orange">YA ESTÁS REGISTRADO</p>
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-digitaltrends.png" alt="Image Digital Trends">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>NOV</p>
                                </div>
                                <h3>EMMS DIGITAL TRENDS</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <p class="purple">PRÓXIMAMENTE</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="emms__eventCards__list emms__eventCards__list--mb emms__fade-in main-carousel" data-flickity>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-ecommerce.png" alt="Image Ecommerce">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p><span>20</span>MAY</p>
                                </div>
                                <h3>EMMS ECOMMERCE</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <a href="">Regístrate gratis →</a>
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-fintech.png" alt="Image Fintech">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>AGO</p>
                                </div>
                                <h3>EMMS FINTECH</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <a href="">Acceder →</a>
                                    <p class="orange">YA ESTÁS REGISTRADO</p>
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-digitaltrends.png" alt="Image Digital Trends">
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>NOV</p>
                                </div>
                                <h3>EMMS DIGITAL TRENDS</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <strong>adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <p class="purple">PRÓXIMAMENTE</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Central Video -->
        <section class="emms__centralvideo">
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <div class="emms__centralvideo__title emms__fade-in">
                    <h2>Llega una nueva versión del EMMS 2023, el evento online más esperado del año</h2>
                    <p>Inspírate y capacítate desde la comodidad de tu casa. Súmate ahora al evento que te acercará a los mayores expertos de Marketing Digital</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <span></span>
                    <video src="src/img/video-ejemplo.mp4" controls></video>
                </div>
                <div class="emms__centralvideo__cta emms__fade-in">
                    <a href="" class="emms__cta">REGÍSTRATE AHORA</a>
                </div>
            </div>
        </section>

        <!-- Event numbers -->
        <section class="emms__eventnumbers" id="boxNumber">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">El evento más importante de Marketing Digital en números</h2>
                <ul class="emms__fade-in">
                    <li>
                        <p class="number" id="count1">200.000</p>
                        <span>Inscritos</span>
                    </li>
                    <li>
                        <p class="number" id="count2">15</p>
                        <span>Ediciones</span>
                    </li>
                    <li>
                        <p class="number" id="count3">10</p>
                        <span>Países</span>
                    </li>
                    <li>
                        <p class="number" id="count4">150</p>
                        <span>Speakers</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Separator -->
        <div class="emms__separator"></div>

        <!-- Speakers -->
        <section class="emms__home__speakers">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Algunos de los conferencistas que han pasado por las últimas ediciones de EMMS:</h2>
                <div class="emms__speakerslist emms__fade-in">
                    <ul>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-neil-patel.png" alt="Neil Patel" class="emms__speakerslist__item__photo">
                            <p>Neil Patel</p>
                            <img src="src/img/logos/logo-np-digital.png" alt="NP Digital" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-vero-ruiz-del-vizo.png" alt="Vero Ruiz del Vizo" class="emms__speakerslist__item__photo">
                            <p>Vero Ruiz del Vizo</p>
                            <img src="src/img/logos/logo-vero.png" alt="Veró" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-tim-ash.png" alt="Tim Ash" class="emms__speakerslist__item__photo">
                            <p>Tim Ash</p>
                            <img src="src/img/logos/logo-timash.png" alt="TimAsh.com" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-pablo-castellano.png" alt="Pablo Castellano" class="emms__speakerslist__item__photo">
                            <p>Pablo Castellano</p>
                            <img src="src/img/logos/logo-socialmood.png" alt="Socialmood" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-marcos-pueyrredon.png" alt="Marcos Pueyrredón " class="emms__speakerslist__item__photo">
                            <p>Marcos Pueyrredón </p>
                            <img src="src/img/logos/logo-vtex.png" alt="Vtex" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-julia-rayeb.png" alt="Julia Rayeb" class="emms__speakerslist__item__photo">
                            <p>Julia Rayeb</p>
                            <img src="src/img/logos/logo-facebook.png" alt="Facebook" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-alan-schulte.png" alt="Alan Schulte" class="emms__speakerslist__item__photo">
                            <p>Alan Schulte</p>
                            <img src="src/img/logos/logo-linkedin.png" alt="LinkedIn" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-ivette-chalela.png" alt="Ivette Chalela Naffah" class="emms__speakerslist__item__photo">
                            <p>Ivette Chalela Naffah</p>
                            <img src="src/img/logos/logo-waze.png" alt="Waze" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-lolo-alvarez-diaz.png" alt="Lolo Alvarez Díaz" class="emms__speakerslist__item__photo">
                            <p>Lolo Alvarez Díaz</p>
                            <img src="src/img/logos/logo-arcosdorados.png" alt="Arcos Dorados" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-gustavo-orjuela.png" alt="Gustavo Orjuela" class="emms__speakerslist__item__photo">
                            <p>Gustavo Orjuela</p>
                            <img src="src/img/logos/logo-wayra.png" alt="Wayra" class="emms__speakerslist__item__logo">
                        </li>
                    </ul>
                </div>
                <small class="emms__fade-in">Próximamente anunciaremos los Speakers 2023.<br>Regístrate gratis ahora y descubre antes que nadie las últimas novedades del EMMS.</small>
                <a href="" class="emms__cta emms__fade-in">RESERVA TU LUGAR</a>
            </div>
            <div class="emms__background-a"></div>
        </section>

        <!-- Separator -->
        <div class="emms__separator"></div>

        <!-- Users comments -->
        <section class="emms__userscomments">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nuestros usuarios dicen...</h2>
                <ul class="emms__userscomments__list emms__userscomments__list--dk emms__fade-in">
                    <li class="emms__userscomments__list__item">
                        <p>“No podía configurar el dominio en mi cuenta de Doppler. Muy buena explicación, ahora todo es más claro”<em>Santiago<img src="src/img/flag-argentina.png" alt="Argentina"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>““He desperdiciado mucho tiempo antes, ahora sé cómo implementar una buena estrategia de Email Marketing para mi negocio””<em>Luciana<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>““He logrado aumentar las ventas de mi Tienda Online desde que comencé a utilizar Doppler, ¡gracias!””<em>Lisbeth<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                </ul>
                <ul class="emms__userscomments__list emms__userscomments__list--mb main-carousel" data-flickity>
                    <li class="emms__userscomments__list__item">
                        <p>“No podía configurar el dominio en mi cuenta de Doppler. Muy buena explicación, ahora todo es más claro”<em>Santiago<img src="src/img/flag-argentina.png" alt="Argentina"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>““He desperdiciado mucho tiempo antes, ahora sé cómo implementar una buena estrategia de Email Marketing para mi negocio””<em>Luciana<img src="src/img/flag-mexico.png" alt="México"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>““He logrado aumentar las ventas de mi Tienda Online desde que comencé a utilizar Doppler, ¡gracias!””<em>Lisbeth<img src="src/img/flag-colombia.png" alt="Colombia"></em></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Frequent Questions -->
        <section class="emms__frequentquestions">
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <h2 class="emms__fade-in">Preguntas frecuentes</h2>
                <ul class="emms__frequentquestions__list emms__fade-in">
                    <li class="emms__frequentquestions__list__item open">
                        <button class="emms__frequentquestions__list__item__head">¿Cómo puedo participar en el Global Marketing Day 2023?</button>
                        <p class="emms__frequentquestions__list__item__content">El Global Marketing Day 2023 es un evento online. Por favor, inscríbete rellenando el formulario y entra en <a href="https://www.globalmarketingday.com/" target="_blank">globalmarketingday.com</a> el 16 de febrero de 2023. ¡La retransmisión en directo estará disponible en la web! Te avisaremos con antelación sobre la retransmisión.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">¿Cómo puedo participar en el Global Marketing Day 2023?</button>
                        <p class="emms__frequentquestions__list__item__content">El Global Marketing Day 2023 es un evento online. Por favor, inscríbete rellenando el formulario y entra en <a href="https://www.globalmarketingday.com/" target="_blank">globalmarketingday.com</a> el 16 de febrero de 2023. ¡La retransmisión en directo estará disponible en la web! Te avisaremos con antelación sobre la retransmisión.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">¿Cómo puedo participar en el Global Marketing Day 2023?</button>
                        <p class="emms__frequentquestions__list__item__content">El Global Marketing Day 2023 es un evento online. Por favor, inscríbete rellenando el formulario y entra en <a href="https://www.globalmarketingday.com/" target="_blank">globalmarketingday.com</a> el 16 de febrero de 2023. ¡La retransmisión en directo estará disponible en la web! Te avisaremos con antelación sobre la retransmisión.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">¿Cómo puedo participar en el Global Marketing Day 2023?</button>
                        <p class="emms__frequentquestions__list__item__content">El Global Marketing Day 2023 es un evento online. Por favor, inscríbete rellenando el formulario y entra en <a href="https://www.globalmarketingday.com/" target="_blank">globalmarketingday.com</a> el 16 de febrero de 2023. ¡La retransmisión en directo estará disponible en la web! Te avisaremos con antelación sobre la retransmisión.</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Companies list -->
        <section class="emms__companies ">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nos han acompañado en ediciones anteriores</h2>
                <ul class="emms__companies__list emms__fade-in">
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-metricool.png" alt="Metricool"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-wayra.png" alt="Wayra"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-asociacion-marketing-espana.png" alt="Asociación de Marketing de España"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-camece.png" alt="Camece"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-capece.png" alt="Capece"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-amvo.png" alt="AMVO"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-linkedin.png" alt="LinkedIn"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-bigbox.png" alt="Bigbox"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-semrush.png" alt="Semrush"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-crehana.png" alt="Crehana"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-marketing-4ecommerce.png" alt="Marketing 4 Ecommerce"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-vtex.png" alt="VTEX"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-banco-frances.png" alt="BBVA Francés"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-airbnb.png" alt="Airbnb"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-woocomerce.png" alt="Woocommerce"></li>
                </ul>
                <small class="emms__fade-in">¿Quieres ser Media Partner del EMMS 2022? Escríbenos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>
</body>

</html>
