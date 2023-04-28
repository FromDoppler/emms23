<!---------------------------------------------- DÍA 1 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>MARTES</strong> 16 DE MAYO</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 02:00 p.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+2023&iso=20230516T11&p1=51&ah=5" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(1);
    foreach ($speakers as $speaker) : ?>
        <li class="emms__calendar__list__item">
            <div class="emms__calendar__list__item__card">
                <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                    <p><?= $speaker['exposes'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__speaker">
                    <div class="emms__calendar__list__item__card__speaker__image">
                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                    </div>
                    <div class="emms__calendar__list__item__card__speaker__text">
                        <h4><?= $speaker['name'] ?></h4>
                        <h5><?= $speaker['job'] ?></h5>
                        <ul>
                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="emms__calendar__list__item__card__description">
                    <p><?= $speaker['description'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__business">
                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                    <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                    <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                    <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                        <h4><?= $speaker['name'] ?></h4>
                        <p><?= $speaker['bio'] ?></p>
                        <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                    </div>
                </div>
            </div>
            <div class="emms__calendar__list__item__country">
                <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(1);
    foreach ($speakers as $speaker) : ?>
        <li class="emms__calendar__list__item">
            <div class="emms__calendar__list__item__card">
                <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                    <p><?= $speaker['exposes'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__speaker">
                    <div class="emms__calendar__list__item__card__speaker__image">
                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                    </div>
                    <div class="emms__calendar__list__item__card__speaker__text">
                        <h4><?= $speaker['name'] ?></h4>
                        <h5><?= $speaker['job'] ?></h5>
                        <ul>
                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="emms__calendar__list__item__card__description">
                    <p><?= $speaker['description'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__business">
                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                    <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                    <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                    <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                        <h4><?= $speaker['name'] ?></h4>
                        <p><?= $speaker['bio'] ?></p>
                        <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                    </div>
                </div>
            </div>
            <div class="emms__calendar__list__item__country">
                <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>





<!---------------------------------------------- DÍA 2 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>MIÉRCOLES</strong> 17 DE MAYO</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 02:00 p.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+2023&iso=20230516T11&p1=51&ah=5" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(2);
    foreach ($speakers as $speaker) : ?>
        <li class="emms__calendar__list__item">
            <div class="emms__calendar__list__item__card">
                <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                    <p><?= $speaker['exposes'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__speaker">
                    <div class="emms__calendar__list__item__card__speaker__image">
                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                    </div>
                    <div class="emms__calendar__list__item__card__speaker__text">
                        <h4><?= $speaker['name'] ?></h4>
                        <h5><?= $speaker['job'] ?></h5>
                        <ul>
                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="emms__calendar__list__item__card__description">
                    <p><?= $speaker['description'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__business">
                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                    <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                    <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                    <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                        <h4><?= $speaker['name'] ?></h4>
                        <p><?= $speaker['bio'] ?></p>
                        <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                    </div>
                </div>
            </div>
            <div class="emms__calendar__list__item__country">
                <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(2);
    foreach ($speakers as $speaker) : ?>
        <li class="emms__calendar__list__item">
            <div class="emms__calendar__list__item__card">
                <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                    <p><?= $speaker['exposes'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__speaker">
                    <div class="emms__calendar__list__item__card__speaker__image">
                        <img src="./admin/speakers/uploads/<?= $speaker['image'] ?>" alt="<?= $speaker['alt_image'] ?>">
                    </div>
                    <div class="emms__calendar__list__item__card__speaker__text">
                        <h4><?= $speaker['name'] ?></h4>
                        <h5><?= $speaker['job'] ?></h5>
                        <ul>
                            <?php if (!empty($speaker['sm_twitter'])) : ?>
                                <li><a href="<?= $speaker['sm_twitter'] ?>" target="_blank"><img src="src/img/icons/icono-twitter-b.svg" alt="Twitter"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_linkedin'])) : ?>
                                <li><a href="<?= $speaker['sm_linkedin'] ?>" target="_blank"><img src="src/img/icons/icono-linkedin-b.svg" alt="LinkedIn"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_instagram'])) : ?>
                                <li><a href="<?= $speaker['sm_instagram'] ?>" target="_blank"><img src="src/img/icons/icono-instagram-b.svg" alt="Instagram"></a></li>
                            <?php endif; ?>
                            <?php if (!empty($speaker['sm_facebook'])) : ?>
                                <li><a href="<?= $speaker['sm_facebook'] ?>" target="_blank"><img src="src/img/icons/icono-facebook-b.svg" alt="Facebook"></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="emms__calendar__list__item__card__description">
                    <p><?= $speaker['description'] ?></p>
                </div>
                <div class="emms__calendar__list__item__card__business">
                    <img src="./admin/speakers/uploads/<?= $speaker['image_company'] ?>" alt="<?= $speaker['alt_image_company'] ?>">
                    <!-- <a href="../../speakers-interna.php?slug=nombrespeaker" class="emms__calendar__list__item__card__btn-conference">Ver conferencia</a> -->
                    <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                    <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                        <h4><?= $speaker['name'] ?></h4>
                        <p><?= $speaker['bio'] ?></p>
                        <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                    </div>
                </div>
            </div>
            <div class="emms__calendar__list__item__country">
                <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
