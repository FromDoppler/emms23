<?php
require_once('././config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('././src/components/head-ecommerce.php'); ?>
    <?php include_once('././src/components/head.php'); ?>
</head>

<body class="emms__internal-sponsors">

    <!-- Header -->
    <header class="emms__header">
        <div class="emms__container--lg emms__fade-in">
            <div class="emms__header__logo">
                <a href="./index.php"><img src="src/img/logos/logo-emms.png" alt="Emms 2023"></a>
            </div>
            <div class="emms__header__logo">
                <a href="./index.php"><img src="src/img/logos/logo-siteground.png" alt="Siteground"></a>
            </div>
        </div>
    </header>

    <main>

        <!-- Hero -->
        <section class="emms__internal-sponsors__hero">
            <div class="emms__background-a"></div>
            <div class="emms__container--lg emms__fade-top">
                <div class="emms__internal-sponsors__hero__content">
                    <h1>Aquí va el Título de la cápsula.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                </div>
                <div class="emms__internal-sponsors__hero__video">
                    <video src="src/img/video-ejemplo.mp4" controls></video>
                </div>
            </div>
        </section>

        <!-- Resource -->
        <section class="emms__internal-sponsors__resource">
            <div class="emms__container--md emms__fade-in">
                <div class="emms__internal-sponsors__resource__picture">
                    <img src="src/img/download.png" alt="download">
                </div>
                <div class="emms__internal-sponsors__resource__text">
                    <h2>Aquí va el título del Lead Magnet del Sponsor</h2>
                    <p>Aquí va una descripción del Recurso. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    <a href="" class="emms__cta">ACCEDER</a>
                </div>
            </div>
        </section>

        <!-- Description -->
        <section class="emms__internal-sponsors__description">
            <div class="emms__background-a"></div>
            <div class="emms__container--md emms__fade-in">
                <h2>Conoce más sobre “Nombre del Sponsor”</h2>
                <p>Aquí va una descripción del Sponsor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <a href="" class="emms__cta">CONOCE MÁS</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include_once('././src/components/footer.php'); ?>

</body>

</html>
