<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);

if (isset($_POST['btn-save'])) {
    // variables for input data
    $name = $_POST['name'];
    $image_home =  $_FILES["image_home"]["name"];
    $file_name = $_FILES["image_home"]["name"];
    $file_tmp = $_FILES["image_home"]["tmp_name"];
    if ($file_name != '') {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
    $alt_image_home = $_POST['alt_image_home'];
    $link_site = $_POST['link_site'];
    $orden_home = $_POST['orden_home'];
    $title = $_POST['title'];
    $description_card = $_POST['description_card'];
    $slug = $_POST['slug'];
    $orden_card = $_POST['orden_card'];
    $description = $_POST['description'];
    $image_landing =  $_FILES["image_landing"]["name"];
    $file_name = $_FILES["image_landing"]["name"];
    $file_tmp = $_FILES["image_landing"]["tmp_name"];
    if ($file_name != '') {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
    $alt_image_landing = $_POST['alt_image_landing'];
    $youtube = $_POST['youtube'];
    $image_youtube =  $_FILES["image_youtube"]["name"];
    $file_name = $_FILES["image_youtube"]["name"];
    $file_tmp = $_FILES["image_youtube"]["tmp_name"];
    if ($file_name != '') {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
    $alt_image_youtube = $_POST['alt_image_youtube'];
    $title_magnet = $_POST['title_magnet'];
    $description_magnet = $_POST['description_magnet'];
    $link_magnet = $_POST['link_magnet'];
    $title_learnmore = $_POST['title_learnmore'];
    $description_learnmore = $_POST['description_learnmore'];
    $link_learnmore = $_POST['link_learnmore'];
    // variables for input data

    // sql query for inserting data into database

    $sql_query = "INSERT INTO aliados_pro (`name`,`image_home`,`alt_image_home`,`link_site`,`orden_home`,`title`,`description_card`,`slug`,`orden_card`,`description`,`image_landing`,`alt_image_landing`,`youtube`,`image_youtube`,`alt_image_youtube`,`title_magnet`,`description_magnet`,`link_magnet`,`title_learnmore`,`description_learnmore`,`link_learnmore`) VALUES('" . $name . "','" . $image_home . "','" . $alt_image_home . "','" . $link_site . "','" . $orden_home . "','" . $title . "','" . $description_card . "','" . $slug . "','" . $orden_card . "','" . $description . "','" . $image_landing . "','" . $alt_image_landing . "','" . $youtube . "','" . $image_youtube . "','" . $alt_image_youtube . "','" . $title_magnet . "','" . $description_magnet . "','" . $link_magnet . "','" . $title_learnmore . "','" . $description_learnmore . "','" . $link_learnmore . "')";
    // sql query for inserting data into database

    // sql query execution function
    if (mysqli_query($con, $sql_query)) {

        @header("Location: /admin/aliados_pro/index.php?token=" . $_GET['token']);
    } else {
?>
        <script type="text/javascript">
            alert('error occured while inserting your data');
        </script>
<?php
    }
    // sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ABM Aliados PRO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <center>

        <div id="container">
            <div id="table-responsive">
                <h3>Alta Aliados Pro</h3>
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
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_home" class="form-label">Image_home:</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="image_home" name="image_home" required placeholder="Image_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_home" class="form-label">Alt_image_home:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="alt_image_home" name="alt_image_home" required placeholder="Alt_image_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_site" class="form-label">Link_site:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="link_site" name="link_site" placeholder="Link_site">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="orden_home" class="form-label">Orden_home:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="orden_home" name="orden_home" required placeholder="Orden_home">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title" class="form-label">Title:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_card" class="form-label">Description_card:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="description_card" name="description_card" placeholder="Description_card">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="slug" class="form-label">Slug:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="orden_card" class="form-label">Orden_card:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="orden_card" name="orden_card" placeholder="Orden_card">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description" class="form-label">Description:</label>
                            </td>
                            <td>
                                <textarea id="description" name="description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_landing" class="form-label">Image_landing:</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="image_landing" name="image_landing" placeholder="Image_landing">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_landing" class="form-label">Alt_image_landing:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="alt_image_landing" name="alt_image_landing" placeholder="Alt_image_landing">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="youtube" class="form-label">Youtube:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image_youtube" class="form-label">Image_youtube:</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="image_youtube" name="image_youtube" placeholder="Image_youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="alt_image_youtube" class="form-label">Alt_image_youtube:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="alt_image_youtube" name="alt_image_youtube" placeholder="Alt_image_youtube">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title_magnet" class="form-label">Title_magnet:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="title_magnet" name="title_magnet" placeholder="Title_magnet">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_magnet" class="form-label">Description_magnet:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="description_magnet" name="description_magnet"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_magnet" class="form-label">Link_magnet:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="link_magnet" name="link_magnet" placeholder="Link_magnet">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="title_learnmore" class="form-label">Title_learnmore:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="title_learnmore" name="title_learnmore" placeholder="Title_learnmore">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description_learnmore" class="form-label">Description_learnmore:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="description_learnmore" name="description_learnmore"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="link_learnmore" class="form-label">Link_learnmore:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="link_learnmore" name="link_learnmore" placeholder="Link_learnmore">
                            </td>
                        </tr>

                        <tr>
                            <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </center>
</body>

</html>
