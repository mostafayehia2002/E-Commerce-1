<?php
session_start();
$id = $_SESSION['admin'];
include("../Database/database.php");
if (!isset($id)) {
    header("location:index.php");
    exit;
} else {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <title>Home page</title>
</head>

<body>
    <?php include_once("Dashboard.php"); ?>
  
    <div class="container"  style="height:100vh">



    </div>
    <script src="../JS/admin.js"></script>   
</body>

</html>