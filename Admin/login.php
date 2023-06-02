<?php
session_start();
include("../Database/database.php");
$error=[];
if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];
if(empty($username)){
$error["username"]="UserName is Required";
}
if(empty($password)){
 $error["password"]="Password is Required";
}
if(!empty($username) && !empty($password)){
$sql=$con->query("SELECT * FROM `admin-login` WHERE UserName='$username' AND Password='$password'");
$data=$sql->fetch(PDO::FETCH_ASSOC);
$row=$sql->rowCount();
if($row==0){
    $error['data']="UserName Not Found";
}else{
     $_SESSION['admin']=$data['ID'];
    header("location:Home.php?status=home");
    exit;
}


}




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Admin Login</title>
</head>
<body>

<div class="login">
<h2 class="header">Admin Dashboard</h2>
<form action="" method="POST" class="admin-login">
    <div class="username">
        <label for="username">UserName</label>
        <br>
        <i class="fa-solid fa-user"></i>
        <input type="text" name="username"  id="username">
        <?php
        if(isset($error['username'])){?>
           
         <div class="error"><?php  echo  $error['username']?></div>

       <?php } ?>
      
    </div>
    <div class="password">
        <label for="password">Password</label>
        <br>
        <i class="fa-sharp fa-solid fa-key"></i>
        <input type="password" name="password"  id="password" >
        <?php
        if(isset($error['password'])){?>
           
         <div class="error"><?php echo $error['password']?></div>

       <?php }?>
    </div>

    <p class="forget-password">
        <a href="#">Forget your password?</a>
    </p>

<div class="submit">
    <input type="submit" value="Login" name="login">
</div>
<?php if(isset($error['data'])){?>
           
           <div class="error" style="text-align: center"><?php  echo  $error['data']?></div>
  
         <?php }?>
</form>

</div>

</body>

</html>