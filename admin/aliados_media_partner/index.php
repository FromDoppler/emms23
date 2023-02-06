
<?php
include_once '../config.php';
include_once '../../utils/GeoIp.php';
$ip = GeoIp::getIp();
isIPAllow($ip, $ALLOW_IPS);



if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM aliados_media_partner WHERE id=".$_GET['delete_id'];
 mysqli_query($con,$sql_query);
 @header("Location: $_SERVER[PHP_SELF]?token=".$_GET['token']);
}
/*if(isset($_GET['changestatus_id']))
{
 $sql_query="UPDATE aliados_media_partner SET `status`='".$_GET['status']."' WHERE id=".$_GET['changestatus_id'];
 mysqli_query($con,$sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ABM Aliados MEDIA PARTNER</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> <link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id, token)
{
  window.location.href='edit_aliados_media_partner.php?edit_id='+id+"&token="+token;
}
function view_id(id, token)
{
  window.location.href='view_aliados_media_partner.php?view_id='+id+"&token="+token;
}
function delete_id(id, token)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='index.php?delete_id='+id+"&token="+token;
 }
}
/*function changestatus_id(id,status)
{
  window.location.href='index.php?changestatus_id='+id+'&status='+status;
}*/
</script>
</head>
<body>
<center>

<div id="container"> <div id="table-responsive">
    <h3>Listado Aliados Media Partner</h3>
    </div>
</div>

<div id="container">
      <br/><a href="/admin/index.php?token=<?=$_GET['token']?>"> Menu Principal</a>
 <div id="table-responsive">
 
    <table  class="table table-striped" > 
    <tr>
    <th colspan="7"><br><a href="add_aliados_media_partner.php?token=<?=$_GET['token']?>">ADD Aliados Media Partner</a></th>
    </tr>
    <th>Indice</th>
    <th>name</th>
    <th>image_home</th>
    <th>orden_home</th>



   
    <th colspan="2">Actions</th>
    </tr>
    <?php
 $sql_query="SELECT * FROM aliados_media_partner ORDER BY cast(orden_home as unsigned)";
 $result_set=mysqli_query($con,$sql_query);
 $i=1;
 while($row=mysqli_fetch_row($result_set))
 {
  ?>
        <tr>
        <td align="center" ><?php echo $i; ?></td>
        <td align="center" > <a href="javascript:view_id('<?=$row[0]?>', '<?=$_GET['token']?>')"> <?php echo $row[1]; ?> </a> </td>
        <td align="center" > <img src="uploads/<?=$row[2]?>" alt="<?=$row[3]?>" width="75" height="75"></td>
        <td align="center" > <?php echo $row[4]; ?> </td>

        <td align="center"><a href="javascript:edt_id('<?=$row[0]?>', '<?=$_GET['token']?>')">Edit</a></td>
        <td align="center"><a href="javascript:delete_id('<?=$row[0]?>', '<?=$_GET['token']?>')">Delete</a></td>
        </tr>
        <?php
       $i++;  
 }
 ?>
    </table>
    </div>
</div>

</center>
</body>
</html>





