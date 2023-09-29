<!---------------------------------------------- DÍA 1 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>DÍA 1</strong> - LUNES 13 DE NOVIEMBRE</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends%3A+d%C3%ADa+1&iso=20231113T11&p1=51&ah=6" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(1);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(1);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<!-- VIP -->
<div class="emms__calendar__vip">
    <div class="emms__calendar__vip__title emms__fade-in">
        <h4>Contenidos exclusivos para Asistentes VIP </h4>
    </div>
    <div class="emms__calendar__vip__card emms__calendar__vip__card--large emms__fade-in">
        <div class="emms__calendar__vip__card__title">
            <h5>Networking <span>Asistentes VIP</span></h5>
        </div>
        <div class="emms__calendar__vip__card__description">
            <p>¿Qué mejor que conectar con colegas y debatir sobre las últimas tendencias en la industria? ¡Disfruta de este espacio para ampliar tu red y hacer crecer tu negocio!</p>
        </div>
        <div class="emms__calendar__date__country">
            <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
            <a href="https://www.addevent.com/event/Sg18803059" target="_blank">Mira el horario de tu país</a>
        </div>
    </div>
    <!-- List VIP-->
    <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(1);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(1);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>






<!---------------------------------------------- DÍA 2 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>DÍA 2</strong> - MARTES 14 DE NOVIEMBRE</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends%3A+d%C3%ADa+2&iso=20231114T11&p1=51&ah=6" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(2);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(2);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>


<!-- VIP -->
<div class="emms__calendar__vip">
    <div class="emms__calendar__vip__title emms__fade-in">
        <h4>Contenidos exclusivos para Asistentes VIP</h4>
    </div>
    <div class="emms__calendar__vip__card emms__calendar__vip__card--large emms__fade-in">
        <div class="emms__calendar__vip__card__title">
            <h5>Networking <span>Asistentes VIP</span></h5>
        </div>
        <div class="emms__calendar__vip__card__description">
            <p>¿Qué mejor que conectar con colegas y debatir sobre las últimas tendencias en la industria? ¡Disfruta de este espacio para ampliar tu red y hacer crecer tu negocio!</p>
        </div>
        <div class="emms__calendar__date__country">
            <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
            <a href="https://www.addevent.com/event/pK18803098" target="_blank">Mira el horario de tu país</a>
        </div>
    </div>
    <!-- List VIP-->
    <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(2);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(2);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>





<!---------------------------------------------- DÍA 3 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>DÍA 3</strong> - MIÉRCOLES 15 DE NOVIEMBRE</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends%3A+d%C3%ADa+3&iso=20231115T11&p1=51&ah=6" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(3);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(3);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>


<!-- VIP -->
<div class="emms__calendar__vip">
    <div class="emms__calendar__vip__title emms__fade-in">
        <h4>Contenidos exclusivos para Asistentes VIP </h4>
    </div>
    <div class="emms__calendar__vip__card emms__calendar__vip__card--large emms__fade-in">
        <div class="emms__calendar__vip__card__title">
            <h5>Networking <span>Asistentes VIP</span></h5>
        </div>
        <div class="emms__calendar__vip__card__description">
            <p>¿Qué mejor que conectar con colegas y debatir sobre las últimas tendencias en la industria? ¡Disfruta de este espacio para ampliar tu red y hacer crecer tu negocio!</p>
        </div>
        <div class="emms__calendar__date__country">
            <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
            <a href="https://www.addevent.com/event/qQ18803133" target="_blank">Mira el horario de tu país</a>
        </div>
    </div>
    <!-- List VIP-->
    <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(3);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(3);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>





<!---------------------------------------------- DÍA 4 ------------------------------------------------>

<div class="emms__calendar__date emms__fade-in">
    <h3><strong>DÍA 4</strong> - JUEVES 16 DE NOVIEMBRE</h3>
    <div class="emms__calendar__date__country">
        <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
        <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends%3A+d%C3%ADa+4&iso=20231116T11&p1=51&ah=6" target="_blank">Mira el horario de tu país</a>
    </div>
</div>

<!-- List -->
<ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(4);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
    <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay(4);
    foreach ($speakers as $speaker) : ?>
        <?php if (($speaker['exposes'] === "conference") || ($speaker['exposes'] === "interview") && ($speaker['event'] === "digital-trends")) : ?>
            <li class="emms__calendar__list__item">
                <div class="emms__calendar__list__item__card">
                    <?php if ($speaker['exposes'] === "conference") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--interview">
                            <p>Conferencia</p>
                        </div>
                    <?php elseif ($speaker['exposes'] === "interview") : ?>
                        <div class="emms__calendar__list__item__card__label emms__calendar__list__item__card__label--conference">
                            <p>Entrevista</p>
                        </div>
                    <?php endif; ?>
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
                        <?php if (($speaker['bio']) != '0') : ?>
                            <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                            <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                <h4><?= $speaker['name'] ?></h4>
                                <p><?= $speaker['bio'] ?></p>
                                <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="emms__calendar__list__item__country">
                    <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                    <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>


<!-- VIP -->
<div class="emms__calendar__vip">
    <div class="emms__calendar__vip__title emms__fade-in">
        <h4>Contenidos exclusivos para Asistentes VIP</h4>
    </div>
    <div class="emms__calendar__vip__card emms__calendar__vip__card--large emms__fade-in">
        <div class="emms__calendar__vip__card__title">
            <h5>Networking <span>Asistentes VIP</span></h5>
        </div>
        <div class="emms__calendar__vip__card__description">
            <p>¿Qué mejor que conectar con colegas y debatir sobre las últimas tendencias en la industria? ¡Disfruta de este espacio para ampliar tu red y hacer crecer tu negocio!</p>
        </div>
        <div class="emms__calendar__date__country">
            <span><img src="src/img/flag-argentina.png" alt="Argentina">(ARG) 12:00 a.m</span>
            <a href="https://www.addevent.com/event/oX18803134" target="_blank">Mira el horario de tu país</a>
        </div>
    </div>
    <!-- List VIP-->
    <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(4);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <ul class="emms__calendar__list emms__calendar__list--mb main-carousel emms__fade-in" data-flickity>
        <?php
        require_once('./utils/DB.php');
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $speakers = $db->getSpeakersByDay(4);
        foreach ($speakers as $speaker) : ?>
            <?php if (($speaker['exposes'] === "workshop") && ($speaker['event'] === "digital-trends")) : ?>
                <li class="emms__calendar__list__item">
                    <div class="emms__calendar__list__item__card">
                        <div class="emms__calendar__list__item__card__label">
                            <p>Workshop</p>
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
                            <?php if (($speaker['bio']) != '0') : ?>
                                <a class="emms__calendar__list__item__card__btn-bio">Ver Bio →</a>
                                <div class="emms__calendar__list__item__card__bio emms__calendar__list__item__card__bio--hide bio-speaker">
                                    <h4><?= $speaker['name'] ?></h4>
                                    <p><?= $speaker['bio'] ?></p>
                                    <a class="emms__calendar__list__item__card__btn-bio-hide"> ← Volver</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="emms__calendar__list__item__country">
                        <span><img src="src/img/flags/arg.png" alt="">(ARG) <?= $speaker['time'] ?></span>
                        <a href="<?= $speaker['link_time'] ?>" target="_blank">Mira el horario de tu país</a>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
