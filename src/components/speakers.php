 <?php
    require_once('./utils/DB.php');
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getAllSpeakers();
    foreach ($speakers as $speaker) : ?>
     <li class="emms__calendar__list__item">
         <div class="emms__calendar__list__item__card">
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
     </li>
 <?php endforeach; ?>
