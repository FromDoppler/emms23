<?php
require_once('././config.php');
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

        if (!isUserLogged()) {
            window.location.href = getUrlWithParams('/index.php');
        }
    </script>
</head>

<body class="emms__home emms__home-logueado">

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="./index.php"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <a class="emms__header__nav--mb" id="btn-burger"></a>
            <nav class="emms__header__nav emms__header__nav--hidden" id="nav-mb">
                <ul class="emms__header__nav__menu">
                    <li><a href="#" class="active">home</a></li>
                    <li><a href="./ecommerce-registrado.php">ecommerce</a></li>
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
        <section class="emms__home__hero">
            <div class="emms__home__hero__title emms__fade-top">
                <h1><em>TODAS LAS TENDENCIAS DE MARKETING DIGITAL EN UN SOLO LUGAR</em> Vuelve el EMMS, ??recargado!</h1>
                <h2>ONLINE Y GRATUITO</h2>
                <p>Tras <strong>15 a??os</strong> como el evento l??der en Latam y Espa??a, <strong>el EMMS evoluciona</strong>. En 2023 tendr??s <strong>3 eventos exclusivos</strong> para capacitarte e inspirarte con los referentes de tu industria.</p>
                <div id="EMMS2023-ediciones"></div>
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
                                    <p><span>16</span>MAY</p>
                                </div>
                                <h3>EMMS E-commerce</h3>
                                <p>Referentes internacionales de la industria te contar??n qu?? <strong>tendencias y estrategias emplean en sus Tiendas Online</strong> para captar nuevos clientes y aumentar sus ingresos.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <p class="emms__eventCards__list__item__tag dark-purple">YA EST??S REGISTRADO</p>
                                    <a href="./ecommerce-registrado.php">Acceder ???</a>
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
                                <h3>EMMS Fintech</h3>
                                <p>Descubre cu??les son las <strong>estrategias</strong> que implementan las marcas l??deres en el sector financiero: <strong>banca online, billeteras virtuales, industria de seguros</strong> y ??mucho m??s!</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <p class="emms__eventCards__list__item__tag purple">PR??XIMAMENTE</p>
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
                                <h3>EMMS Digital Trends</h3>
                                <p>Como cada a??o, descubre cu??les son las tendencias que aplican tus mayores <strong>referentes internacionales</strong> y n??trete de nuevas <strong>ideas para implementar en tu negocio</strong>.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <p class="emms__eventCards__list__item__tag purple">PR??XIMAMENTE</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="emms__eventCards__list emms__eventCards__list--mb emms__fade-in main-carousel" data-flickity>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-ecommerce.png" alt="Image Ecommerce">
                                <p class="emms__eventCards__list__item__tag dark-purple">YA EST??S REGISTRADO</p>
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p><span>16</span>MAY</p>
                                </div>
                                <h3>EMMS E-commerce</h3>
                                <p>Referentes internacionales de la industria te contar??n qu?? <strong>tendencias y estrategias emplean en sus Tiendas Online</strong> para captar nuevos clientes y aumentar sus ingresos.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                    <a href="./ecommerce-registrado.php">Acceder ???</a>
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-fintech.png" alt="Image Fintech">
                                <p class="emms__eventCards__list__item__tag purple">PR??XIMAMENTE</p>
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>AGO</p>
                                </div>
                                <h3>EMMS Fintech</h3>
                                <p>Descubre cu??les son las <strong>estrategias</strong> que implementan las marcas l??deres en el sector financiero: <strong>banca online, billeteras virtuales, industria de seguros</strong> y ??mucho m??s!</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
                                </div>
                            </div>
                        </li>
                        <li class="emms__eventCards__list__item">
                            <div class="emms__eventCards__list__item__picture">
                                <img src="src/img/card-image-digitaltrends.png" alt="Image Digital Trends">
                                <p class="emms__eventCards__list__item__tag purple">PR??XIMAMENTE</p>
                            </div>
                            <div class="emms__eventCards__list__item__text">
                                <div class="emms__eventCards__list__item__text--corner">
                                    <p>NOV</p>
                                </div>
                                <h3>EMMS Digital Trends</h3>
                                <p>Como cada a??o, descubre cu??les son las tendencias que aplican tus mayores <strong>referentes internacionales</strong> y n??trete de nuevas <strong>ideas para implementar en tu negocio</strong>.</p>
                                <p class="emms__eventCards__list__item__text--feature"><img src="src/img/icons/icon-ticket.svg" alt="Icon">Online y gratuito</p>
                                <div class="emms__eventCards__list__item__text--bottom">
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
                    <h2>Llega una nueva versi??n del EMMS. Ahora, con una edici??n exclusiva por industria</h2>
                    <p>Descubre en este video por qu?? m??s de <strong>70.000 personas</strong> eligen este a??o el EMMS para conocer las <strong>??ltimas tendencias en Marketing Digital</strong>.</p>
                </div>
                <div class="emms__centralvideo__video emms__fade-in">
                    <span></span>
                    <video src="src/img/20230313-EMMS-General.mp4" controls></video>
                </div>
            </div>
        </section>

        <!-- Separator -->
        <div class="emms__separator mb"></div>

        <!-- Event numbers -->
        <section class="emms__eventnumbers" id="boxNumber">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">El EMMS en n??meros</h2>
                <ul class="emms__fade-in">
                    <li>
                        <p class="number" id="count1">250.000</p>
                        <span>Inscritos</span>
                    </li>
                    <li>
                        <p class="number" id="count2">15</p>
                        <span>Ediciones</span>
                    </li>
                    <li>
                        <p class="number" id="count3">10</p>
                        <span>Pa??ses</span>
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
                <h2 class="emms__fade-in">Algunos de los conferencistas que nos han acompa??ado en las ??ltimas ediciones:</h2>
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
                            <img src="src/img/logos/logo-vero.png" alt="Ver??" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-tim-ash.png" alt="Tim Ash" class="emms__speakerslist__item__photo">
                            <p>Tim Ash</p>
                            <img src="src/img/logos/logo-timash.png" alt="TimAsh.com" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-vedant-misra.png" alt="Vedant Misra" class="emms__speakerslist__item__photo">
                            <p>Vedant Misra</p>
                            <img src="src/img/logos/logo-google.png" alt="Google" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-julia-rayeb.png" alt="Julia Rayeb" class="emms__speakerslist__item__photo">
                            <p>Julia Rayeb</p>
                            <img src="src/img/logos/logo-facebook.png" alt="Facebook" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-pablo-laucirica.png" alt="Pablo Laucirica" class="emms__speakerslist__item__photo">
                            <p>Pablo Laucirica</p>
                            <img src="src/img/logos/logo-microsoft.png" alt="Microsoft" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-vilma-nunez.png" alt="Vilma Nu??ez" class="emms__speakerslist__item__photo">
                            <p>Vilma Nu??ez</p>
                            <img src="src/img/logos/logo-vilma.png" alt="Vilma" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-marcos-pueyrredon.png" alt="Marcos Pueyrred??n " class="emms__speakerslist__item__photo">
                            <p>Marcos Pueyrred??n </p>
                            <img src="src/img/logos/logo-vtex.png" alt="Vtex" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-angela-blones.png" alt="??ngela Blones" class="emms__speakerslist__item__photo">
                            <p>??ngela Blones</p>
                            <img src="src/img/logos/logo-angela-blones.png" alt="??ngela Blones" class="emms__speakerslist__item__logo">
                        </li>
                        <li class="emms__speakerslist__item">
                            <img src="src/img/people/speaker-albert-esplugas.png" alt="Albert Esplugas" class="emms__speakerslist__item__photo">
                            <p>Albert Esplugas</p>
                            <img src="src/img/logos/logo-amazon.png" alt="Amazon" class="emms__speakerslist__item__logo">
                        </li>
                    </ul>
                </div>
                <small class="emms__fade-in">Pr??ximamente conocer??s la agenda 2023.<br>Reg??strate gratis y ent??rate antes que nadie de todas las novedades del EMMS.</small>
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
                        <p>???Lo que m??s valoro del EMMS es poder ver en qu?? est??n las empresas m??s importantes del sector, ??y gratis!???<em>Yolanda<img src="src/img/flag-mexico.png" alt="M??xico"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>???Ver las conferencias online es incre??ble. Pude disfrutar de la ??ltima edici??n en el trabajo y verlo con mis compa??eros???<em>Pedro<img src="src/img/flag-espana.png" alt="Espa??a"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>???Me encanta poder irme con ideas nuevas para mi negocio cada a??o, adem??s de pasar tiempo con expertos y colegas???.<em>Nadia<img src="src/img/flag-argentina.png" alt="Argentina"></em></p>
                    </li>
                </ul>
                <ul class="emms__userscomments__list emms__userscomments__list--mb main-carousel" data-flickity>
                    <li class="emms__userscomments__list__item">
                        <p>???Lo que m??s valoro del EMMS es poder ver en qu?? est??n las empresas m??s importantes del sector, ??y gratis!???<em>Yolanda<img src="src/img/flag-mexico.png" alt="M??xico"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>???Ver las conferencias online es incre??ble. Pude disfrutar de la ??ltima edici??n en el trabajo y verlo con mis compa??eros???<em>Pedro<img src="src/img/flag-espana.png" alt="Espa??a"></em></p>
                    </li>
                    <li class="emms__userscomments__list__item">
                        <p>???Me encanta poder irme con ideas nuevas para mi negocio cada a??o, adem??s de pasar tiempo con expertos y colegas???.<em>Nadia<img src="src/img/flag-argentina.png" alt="Argentina"></em></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Frequent Questions -->
        <section class="emms__frequentquestions" id="preguntas-frecuentes">
            <div class="emms__background-a"></div>
            <div class="emms__container--md">
                <h2 class="emms__fade-in">Preguntas frecuentes</h2>
                <ul class="emms__frequentquestions__list emms__fade-in">
                    <li class="emms__frequentquestions__list__item open">
                        <button class="emms__frequentquestions__list__item__head">???????????????? ??Por qu?? asistir al EMMS?</button>
                        <p class="emms__frequentquestions__list__item__content">Es el <strong>evento online y gratuito de Marketing Digital</strong> m??s importante de <strong>Espa??a y Latinoam??rica</strong>. Cada a??o nos eligen expertos de compa????as l??deres de la industria para dar a conocer las principales tendencias en su sector.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??Qu?? obtengo al registrarme al evento?</button>
                        <p class="emms__frequentquestions__list__item__content">Con tu registro podr??s acceder a todas las conferencias de esta y todas las ediciones anteriores para siempre. Adem??s, desbloquear??s <strong>contenidos exclusivos como E-books, Plantillas, descuentos y material audiovisual</strong> para que puedas hacer crecer tu negocio a??n m??s.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??Cu??ndo se realizar?? el EMMS 2023?</button>
                        <p class="emms__frequentquestions__list__item__content">El EMMS 2023 constar?? de 3 ediciones: <strong>E-commerce, Fintech y Digital Trends</strong>, a realizarse en <strong>mayo, agosto y noviembre</strong>, respectivamente. Registr??ndote al evento recibir??s todos las novedades por Email y la confirmaci??n de cada fecha.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??D??nde ser??n los eventos?</button>
                        <p class="emms__frequentquestions__list__item__content">El EMMS es un evento <strong>online</strong>. Es decir, podr??s verlo en vivo desde cualquier dispositivo, est??s donde est??s.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">??? ??Puedo anotarme a otras ediciones?</button>
                        <p class="emms__frequentquestions__list__item__content">??S??! Cuando la fecha del evento se encuentre confirmada, podr??s eligir <a href="#EMMS2023-ediciones">aqu??</a> la edici??n a la que te interese para inscribirte gratis. Completa tus datos y ??listo! Tu lugar ya quedar?? reservado.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??C??mo accedo a la transmisi??n del EMMS una vez registrado?</button>
                        <p class="emms__frequentquestions__list__item__content">Podr??s ver los eventos desde esta misma Web en las fechas indicadas. Una vez que te registres, te enviaremos recordatorios y recibir??s tambi??n el link para conectarte ese d??a.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??Van a estar disponibles las grabaciones despu??s del evento?</button>
                        <p class="emms__frequentquestions__list__item__content">S??, cuando haya finalizado cada EMMS quedar??n subidas al sitio web del evento las grabaciones de todas las charlas. Podr??s revivirlas las veces que desees.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? Me anot?? al evento y a??n no recib?? el Email de confirmaci??n, ??qu?? hago?</button>
                        <p class="emms__frequentquestions__list__item__content">Comun??cate con el equipo de Atenci??n al Cliente de Doppler enviando un Email a <a href="mailto:soporte@fromdoppler.com">soporte@fromdoppler.com</a> para ayudarte a resolverlo.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? Me interesa ser aliado en el evento, ??todav??a estoy a tiempo de sumarme?</button>
                        <p class="emms__frequentquestions__list__item__content">??S?? claro! Comun??cate al Email <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a> para que podamos contarte cu??les son las oportunidades de participar y c??mo podr??as sumarte.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">????Quiero ser speaker del EMMS 2023, ??puedo postularme?</button>
                        <p class="emms__frequentquestions__list__item__content">??Por supuesto! Escr??benos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a> para comentarnos por qu?? deber??as ser ponente en EMMS 2023 y te responderemos a la brevedad.</p>
                    </li>
                    <li class="emms__frequentquestions__list__item close">
                        <button class="emms__frequentquestions__list__item__head">???? ??Obtengo un certificado de participaci??n por asistir al evento?</button>
                        <p class="emms__frequentquestions__list__item__content">??S??! Podr??s descargar tu certificado de asistencia a cada edici??n del EMMS 2023 durante la transmisi??n del evento desde la misma p??gina. ??Te olvidaste de hacerlo? Comun??cate a <a href="mailto:soporte@fromdoppler.com">soporte@fromdoppler.com</a>.</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Companies list -->
        <section class="emms__companies ">
            <div class="emms__container--lg">
                <h2 class="emms__fade-in">Nos han acompa??ado en ediciones anteriores</h2>
                <ul class="emms__companies__list emms__fade-in">
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-metricool.png" alt="Metricool"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-asociacion-marketing-espana.png" alt="Asociaci??n de Marketing de Espa??a"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-capece.png" alt="Capece"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-amvo.png" alt="AMVO"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-linkedin.png" alt="LinkedIn"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-bigbox.png" alt="Bigbox"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-semrush.png" alt="Semrush"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-crehana.png" alt="Crehana"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-marketing-4ecommerce.png" alt="Marketing 4 Ecommerce"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-vtex.png" alt="VTEX"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-banco-frances.png" alt="BBVA Franc??s"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-airbnb.png" alt="Airbnb"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-woocomerce.png" alt="Woocommerce"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-doofinder.png" alt="Doofinder"></li>
                    <li class="emms__companies__list__item"><img src="src/img/logos/logo-easycommerce.png" alt="Easycommerce"></li>
                </ul>
                <small class="emms__fade-in">??Quieres ser aliado del EMMS E-commerce 2023? ??Hablemos! Escr??benos a <a href="mailto:partners@fromdoppler.com">partners@fromdoppler.com</a></small>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>
    <script src="src/<?= VERSION ?>/js/counterAnimation.js"></script>
    <script src="src/<?= VERSION ?>/js/collapsibles.js"></script>

</body>

</html>
