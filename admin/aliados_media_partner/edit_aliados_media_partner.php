<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);

if(isset($_GET['edit_id']))
{
 $sql_query="SELECT * FROM aliados_media_partner WHERE id=".$_GET['edit_id'];
 $result_set=mysqli_query($con,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
}
if(isset($_POST['btn-update']))
{
 // variables for input data
     
   $name = $_POST['name'];
          
  if($_FILES["image_home"]["name"]==''){
 $image_home =  $fetched_row['image_home'];
}else{
  $image_home =  $_FILES["image_home"]["name"];
  $file_name = $_FILES["image_home"]["name"];
$file_tmp = $_FILES["image_home"]["tmp_name"];
  if($file_name!=''){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
       
  }
}
         
   $alt_image_home = $_POST['alt_image_home'];
          
     
   $orden_home = $_POST['orden_home'];
          
  // variables for input data

 // sql query for update data into database
  $sql_query="UPDATE aliados_media_partner SET `name`='$name',`image_home`='$image_home',`alt_image_home`='$alt_image_home',`orden_home`='$orden_home' WHERE id=".$_GET['edit_id'];

 // sql query for update data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('aliados_media_partner updated successfully');
  window.location.href='index.php?token=<?=$_GET['token']?>';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php?token=".$_GET['token']);
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

<div id="container"> <div id="table-responsive">
        <label>Edicion Aliados Media Partner</label>
    </div>
</div>

<div id="container"><div   id="table-responsive">
    <form method="post" enctype="multipart/form-data">
    <table  class="table table-striped">
          <tr>
    <td align="center"><a href="index.php?token=<?=$_GET['token']?>">back to main page</a></td>
    </tr>

      <tr>
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
    <img src="uploads/<?=$fetched_row['image_home']?>" alt="<?=$fetched_row['alt_image_home']?>" width="75" height="75">
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
   <label for="orden_home" class="form-label">Orden_home:</label>
   </td>
    <td>
    <input type="text" value="<?php echo $fetched_row['orden_home'] ?>" class="form-control" id="orden_home" name="orden_home">
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
