<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);


if(isset($_GET['view_id']))
{
 $sql_query="SELECT * FROM aliados_media_partner WHERE id=".$_GET['view_id'];
 $result_set=mysqli_query($con,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>ABM Aliados Media Partner</title>
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
    <td align="center"><a href="index.php?token=<?=$_GET['token']?>">back to main page</a></td>
    </tr>
   <tr>
    <td>
   <label for="name" class="form-label">Name:</label>
   </td>
   <th colspan="5"> <?php echo $fetched_row['name'] ?></th>
</tr>
<tr>
    <td>
   <label for="image" class="form-label">Imagen Home:</label>
   </td>
   <th colspan="5"> <img src="uploads/<?=$fetched_row['image_home']?>" alt="<?=$fetched_row['alt_image_home']?>" width="75" height="75"></th>
</tr>

 <tr>
    <td>
   <label for="alt_image_home" class="form-label">Alt_image_home:</label>
   </td>
   <th colspan="5"> <?php echo $fetched_row['alt_image_home'] ?></th>
</tr>
 <tr>
    <td>
   <label for="orden_home" class="form-label">Orden_home:</label>
   </td>
   <th colspan="5"> <?php echo $fetched_row['orden_home'] ?></th>
</tr>
 <tr>
    <td align="center"><a href="index.php?token=<?=$_GET['token']?>">back to main page</a></td>
    </tr>
 </table>
 </div>
</div>
</body>
</html>
