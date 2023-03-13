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
                    <li><a href="#">contenido exclusivo</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <!-- Hero -->
        <section class="emms__sponsors__hero">
            <div class="emms__sponsors__hero__title">
                <h1><em>EMMS, LA EVOLUCIÓN</em> Contenido premium y exclusivo para registrados del EMMS</h1>
                <p>Descubre los materiales que han preparado para ti nuestros Sponsors. Encontrarás conferencias, recursos descargables ¡y mucho más!</p>
                <a href="" class="emms__cta">REGÍSTRATE AHORA</a>
            </div>
        </section>


        <!-- Sponsors List -->
        <section class="emms__sponsors__list">
            <div class="emms__container--lg">
                <div class="emms__sponsors__list__title">
                    <h2>Aquí encontrarás...</h2>
                    <ul>
                        <li>E-books</li>
                        <li>Videos tutoriales</li>
                        <li>Infografías</li>
                        <li>Infografías</li>
                    </ul>
                </div>
                <div class="emms__sponsors__list__content">
                    <div class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__logo">
                            <img src="" alt="">
                        </div>
                        <h3>Título</h3>
                        <p>Descripción</p>
                        <a href="">Acceder →</a>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

</body>

</html>
