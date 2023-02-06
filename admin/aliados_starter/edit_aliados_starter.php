<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);

if (isset($_GET['edit_id'])) {
    $sql_query = "SELECT * FROM aliados_starter WHERE id=" . $_GET['edit_id'];
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
}
if (isset($_POST['btn-update'])) {
    // variables for input data

    $name = $_POST['name'];

    if ($_FILES["image_home"]["name"] == '') {
        $image_home =  $fetched_row['image_home'];
    } else {
        $image_home =  $_FILES["image_home"]["name"];
        $file_name = $_FILES["image_home"]["name"];
        $file_tmp = $_FILES["image_home"]["tmp_name"];
        if ($file_name != '') {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        }
    }

    $alt_image_home = $_POST['alt_image_home'];

    $link_site = $_POST['link_site'];

    $orden_home = $_POST['orden_home'];

    $title = $_POST['title'];

    $description_card = $_POST['description_card'];

    $slug = $_POST['slug'];

    $orden_card = $_POST['orden_card'];

    $description = $_POST['description'];

    if ($_FILES["image_landing"]["name"] == '') {
        $image_landing =  $fetched_row['image_landing'];
    } else {
        $image_landing =  $_FILES["image_landing"]["name"];
        $file_name = $_FILES["image_landing"]["name"];
        $file_tmp = $_FILES["image_landing"]["tmp_name"];
        if ($file_name != '') {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        }
    }

    $alt_image_landing = $_POST['alt_image_landing'];

    $youtube = $_POST['youtube'];

    if ($_FILES["image_youtube"]["name"] == '') {
        $image_youtube =  $fetched_row['image_youtube'];
    } else {
        $image_youtube =  $_FILES["image_youtube"]["name"];
        $file_name = $_FILES["image_youtube"]["name"];
        $file_tmp = $_FILES["image_youtube"]["tmp_name"];
        if ($file_name != '') {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        }
    }

    $alt_image_youtube = $_POST['alt_image_youtube'];

    $title_magnet = $_POST['title_magnet'];

    $description_magnet = $_POST['description_magnet'];

    $link_magnet = $_POST['link_magnet'];

    $title_learnmore = $_POST['title_learnmore'];

    $description_learnmore = $_POST['description_learnmore'];

    $link_learnmore = $_POST['link_learnmore'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE aliados_starter SET `name`='$name',`image_home`='$image_home',`alt_image_home`='$alt_image_home',`link_site`='$link_site',`orden_home`='$orden_home',`title`='$title',`description_card`='$description_card',`slug`='$slug',`orden_card`='$orden_card',`description`='$description',`image_landing`='$image_landing',`alt_image_landing`='$alt_image_landing',`youtube`='$youtube',`image_youtube`='$image_youtube',`alt_image_youtube`='$alt_image_youtube',`title_magnet`='$title_magnet',`description_magnet`='$description_magnet',`link_magnet`='$link_magnet',`title_learnmore`='$title_learnmore',`description_learnmore`='$description_learnmore',`link_learnmore`='$link_learnmore' WHERE id=" . $_GET['edit_id'];

    // sql query for update data into database

    // sql query execution function
    if (mysqli_query($con, $sql_query)) {
?>
        <script type="text/javascript">
            alert('aliados_starter updated successfully');
            window.location.href = 'index.php?token=<?= $_GET['token'] ?>';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('error occured while updating data');
        </script>
<?php
    }
    // sql query execution function
}
if (isset($_POST['btn-cancel'])) {
    header("Location: index.php?token=" . $_GET['token']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ABM Aliados Starter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <center>

        <div id="container">
            <div id="table-responsive">
                <h3>Edicion Aliados Starter</h3>
            </div>
        </div>

        <div id="container">
            <div id="table-responsive">
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tr>
                            <td align="center"><a href="index.php?token=<?= $_GET['token'] ?>">back to main page</a></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name" class="form-label">Name:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['name'] ?>" class="form-control" id="name" name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_home" class="form-label">Image_home:</label>
                            </td>
                            <td>
                                <img src="uploads/<?= $fetched_row['image_home'] ?>" alt="<?= $fetched_row['alt_image_home'] ?>" width="75" height="75">
                                <input type="file" value="<?php echo $fetched_row['image_home'] ?>" class="form-control" id="image_home" name="image_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_home" class="form-label">Alt_image_home:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['alt_image_home'] ?>" class="form-control" id="alt_image_home" name="alt_image_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_site" class="form-label">Link_site:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['link_site'] ?>" class="form-control" id="link_site" name="link_site">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="orden_home" class="form-label">Orden_home:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['orden_home'] ?>" class="form-control" id="orden_home" name="orden_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title" class="form-label">Title:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['title'] ?>" class="form-control" id="title" name="title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_card" class="form-label">Description_card:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['description_card'] ?>" class="form-control" id="description_card" name="description_card">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="slug" class="form-label">Slug:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['slug'] ?>" class="form-control" id="slug" name="slug">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="orden_card" class="form-label">Orden_card:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['orden_card'] ?>" class="form-control" id="orden_card" name="orden_card">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description" class="form-label">Description:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="description" name="description"><?= $fetched_row['description'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_landing" class="form-label">Image_landing:</label>
                            </td>
                            <td>
                                <img src="uploads/<?= $fetched_row['image_landing'] ?>" alt="<?= $fetched_row['alt_image_landing'] ?>" width="200" height="200">
                                <input type="file" value="<?php echo $fetched_row['image_landing'] ?>" class="form-control" id="image_landing" name="image_landing">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_landing" class="form-label">Alt_image_landing:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['alt_image_landing'] ?>" class="form-control" id="alt_image_landing" name="alt_image_landing">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="youtube" class="form-label">Youtube:</label>
                            </td>
                            <td>
                                <?php
                                if (!empty($fetched_row['youtube'])) {  ?>
                                    <iframe width="420" height="315" src="https://www.youtube.com/embed/<?= $fetched_row['youtube'] ?>">
                                    </iframe>
                                <?php
                                }
                                ?>
                                <input type="text" value="<?php echo $fetched_row['youtube'] ?>" class="form-control" id="youtube" name="youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_youtube" class="form-label">Image_youtube:</label>
                            </td>
                            <td>
                                <?php
                                if (!empty($fetched_row['image_youtube'])) {  ?>
                                    <img src="uploads/<?= $fetched_row['image_youtube'] ?>" alt="<?= $fetched_row['alt_image_youtube'] ?>" width="200" height="200">
                                <?php } ?>
                                <input type="file" value="<?php echo $fetched_row['image_youtube'] ?>" class="form-control" id="image_youtube" name="image_youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_youtube" class="form-label">Alt_image_youtube:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['alt_image_youtube'] ?>" class="form-control" id="alt_image_youtube" name="alt_image_youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title_magnet" class="form-label">Title_magnet:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['title_magnet'] ?>" class="form-control" id="title_magnet" name="title_magnet">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_magnet" class="form-label">Description_magnet:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="description_magnet" name="description_magnet"><?= $fetched_row['description_magnet'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_magnet" class="form-label">Link_magnet:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['link_magnet'] ?>" class="form-control" id="link_magnet" name="link_magnet">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title_learnmore" class="form-label">Title_learnmore:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['title_learnmore'] ?>" class="form-control" id="title_learnmore" name="title_learnmore">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_learnmore" class="form-label">Description_learnmore:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="description_learnmore" name="description_learnmore"><?= $fetched_row['description_learnmore'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_learnmore" class="form-label">Link_learnmore:</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $fetched_row['link_learnmore'] ?>" class="form-control" id="link_learnmore" name="link_learnmore">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
                                <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </center>
</body>

</html>
