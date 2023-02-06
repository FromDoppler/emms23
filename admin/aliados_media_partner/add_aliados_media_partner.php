<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);

if(isset($_POST['btn-save']))
{
 // variables for input data
  $name = $_POST['name'];
  $image_home =  $_FILES["image_home"]["name"];
  $file_name = $_FILES["image_home"]["name"];
  $file_tmp = $_FILES["image_home"]["tmp_name"];
  if($file_name!=''){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
  }
  $alt_image_home = $_POST['alt_image_home'];
  $orden_home = $_POST['orden_home'];
      
    // variables for input data

 // sql query for inserting data into database
 
$sql_query="INSERT INTO aliados_media_partner (`name`,`image_home`,`alt_image_home`,`orden_home`) VALUES('".$name."','".$image_home."','".$alt_image_home."','".$orden_home."')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
 @header("Location: /admin/aliados_media_partner/index.php?token=".$_GET['token']);
 }
 else
 {
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
<title>ABM Aliados Media Partner</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="container"> 
<div id="table-responsive">
        <h3>Alta Aliados Media Partner</h3>
    </div>
</div>
<div id="container"><div   id="table-responsive">
    <form method="post" enctype="multipart/form-data" >
    <table  class="table table-striped">
    <tr>
    <td align="center"><a href="index.php?token=<?=$_GET['token']?>">back to main page</a></td>
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
   <label for="orden_home" class="form-label">Orden_home:</label>
   </td>
    <td>
    <input type="text" class="form-control" id="orden_home" name="orden_home" required placeholder="Orden_home">
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
