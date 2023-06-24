<?php 
session_start();
$id=$_SESSION['admin'];
include("../Database/database.php");
if(!isset($id)){
    header("location:index.php");
    exit;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- External CSS  -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet"> </link>
    <link rel="stylesheet" href="../CSS/table.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <title>update profile</title>

</head>
<body>
<?php include_once("Dashboard.php"); 
$old_img ="Images/".$data['Img'];
if(isset($_POST['update'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $phone=$_POST['phone'];
  $role=$_POST['role'];
  //new photo
  $to="Images/".$_FILES['photo']['name'];
  $from=$_FILES['photo']['tmp_name'];
  move_uploaded_file($from,$to);
  $img=$_FILES['photo']['name'];
  if(!empty($img)){ 
   if($old_img !='Images/profile.jpg'){
     unlink($old_img);
      }
  $update=$con->query("UPDATE `admin_login` SET `UserName`='$username',`Password`='$password',`Phone`='$phone', `Img`='$img'  WHERE ID='$id'");
  }
  else{
    $update=$con->query("UPDATE `admin_login` SET `UserName`='$username',`Password`='$password',`Phone`='$phone' WHERE ID='$id'");
 }
 header("Location:Setting.php?status=update_profile");
  exit();
}
?>
<div class="container1">
  <!-- start navbar -->
  <?php include_once("AdminNavbar.php"); ?>
<!-- end navbar -->

  <form  method="POST" enctype="multipart/form-data">
    <div class="all-fields">

    <div class="input-field file">
        <label for="userPhoto">Photo:</label>
        <br>
        <input type="file" id="userPhoto" name="photo" accept="image/*">
        <img src="Images/<?=$data['Img']?>" class="photo" height="200px" width="200px" Style="display:block">
      </div>
      <div class="input-field">

        <label for="username">User Name:</label>
        <br>
        <input type="text" id="username" name="username" required value="<?=$data['UserName']?>">
      </div>
      <div class="input-field">
        <label for="password">Password:</label>
        <br>
        <input type="text" id="password" name="password" required  value="<?=$data['Password']?>">
      </div>
      <div class="input-field">
        <label for="email">Phone:</label>
        <br>
        <input type="number" id="phone" name="phone" value="<?=$data['Phone']?>">
      </div>

      <div class="input-field">
        <label for="role">Role:</label>
        <br>
        <input list="role" name="role" readonly  value="<?=$data['Status']?>">
        <datalist id="role">
          <option value="0">Sub Admin</option>
          <option value="1">Admin</option>
        </datalist>
      </div>
      
      <div class="input-field  submit">
        <input type="submit" name="update" value="update">
      </div>

    </div>    
    <!--end all feilds -->
  </form>
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="../JS/table.js"></script>
<script src="../JS/admin.js"></script>
</body>
</html>