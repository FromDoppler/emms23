<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);

if (isset($_GET['view_id'])) {
    $sql_query = "SELECT * FROM aliados_pro WHERE id=" . $_GET['view_id'];
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>ABM Aliados PRO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">


        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td align="center"><a href="index.php?token=<?= $_GET['token'] ?>">back to main page</a></td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="form-label">Name:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['name'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="image" class="form-label">Imagen Home:</label>
                    </td>
                    <th colspan="5"> <img src="uploads/<?= $fetched_row['image_home'] ?>" alt="<?= $fetched_row['alt_image_home'] ?>" width="75" height="75"></th>
                </tr>

                <tr>
                    <td>
                        <label for="alt_image_home" class="form-label">Alt_image_home:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['alt_image_home'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="link_site" class="form-label">Link_site:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['link_site'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="orden_home" class="form-label">Orden_home:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['orden_home'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="title" class="form-label">Title:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['title'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="description_card" class="form-label">Description_card:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['description_card'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="slug" class="form-label">Slug:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['slug'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="orden_card" class="form-label">Orden_card:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['orden_card'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="description" class="form-label">Description:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['description'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="image" class="form-label">Imagen Landing:</label>
                    </td>
                    <th colspan="5">
                        <?php if ($fetched_row['image_landing']) : ?>
                            <img src="uploads/<?= $fetched_row['image_landing'] ?>" alt="<?= $$fetched_row['alt_image_landing'] ?>" width="200" height="200">
                        <?php endif; ?>
                    </th>
                </tr>
                <tr>
                    <td>
                        <label for="alt_image_landing" class="form-label">Alt_image_landing:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['alt_image_landing'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="youtube" class="form-label">Youtube:</label>
                    </td>
                    <th colspan="5">
                        <?php
                        if (!empty($fetched_row['youtube'])) {  ?>
                            <iframe width="420" height="315" src="https://www.youtube.com/embed/<?= $fetched_row['youtube'] ?>">
                            </iframe>
                        <?php
                        }
                        ?>
                    </th>
                </tr>
                <tr>
                    <td>
                        <label for="image" class="form-label">Imagen Youtube:</label>
                    </td>
                    <th colspan="5">
                        <?php if (!empty($fetched_row['image_youtube'])) { ?>
                            <img src="uploads/<?= $fetched_row['image_youtube'] ?>" alt="<?= $fetched_row['alt_image_youtube'] ?>" width="200" height="200">
                        <?php } ?>
                    </th>
                </tr>
                <tr>
                    <td>
                        <label for="alt_image_youtube" class="form-label">Alt_image_youtube:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['alt_image_youtube'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="title_magnet" class="form-label">Title_magnet:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['title_magnet'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="description_magnet" class="form-label">Description_magnet:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['description_magnet'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="link_magnet" class="form-label">Link_magnet:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['link_magnet'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="title_learnmore" class="form-label">Title_learnmore:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['title_learnmore'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="description_learnmore" class="form-label">Description_learnmore:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['description_learnmore'] ?></th>
                </tr>
                <tr>
                    <td>
                        <label for="link_learnmore" class="form-label">Link_learnmore:</label>
                    </td>
                    <th colspan="5"> <?= $fetched_row['link_learnmore'] ?></th>
                </tr>
                <tr>
                    <td align="center"><a href="index.php?token=<?= $_GET['token'] ?>">back to main page</a></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
