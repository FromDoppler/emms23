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
                        <a href="">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a href="">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a href="">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a href="">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a href="">Acceder →</a>
                    </li>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="src/img/logos/logo-siteground.png" alt="Siteground">
                        </div>
                        <h3>Acá va el titlulo de la capsula. Acá va el titulo de la capsula.</h3>
                        <p>Comunicación del regalo / beneficio / el plus que aporta</p>
                        <a href="">Acceder →</a>
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
