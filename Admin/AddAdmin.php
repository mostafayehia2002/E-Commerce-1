<?php
session_start();
$id = $_SESSION['admin'];
include("../Database/database.php");
if (!isset($id)) {
  header("location:login.php");
  exit;
} else {
}

?>
<?php 
$get_admin_data=$con->query("SELECT * FROM `admin-login`");
$get_admin_data=$get_admin_data->fetchAll(PDO::FETCH_ASSOC);


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
  <link rel="stylesheet" href="../CSS/all.min.css">
  <link rel="stylesheet" href="../CSS/table.css">
  <link rel="stylesheet" href="../CSS/Admin.css">
  <title>Add Admin</title>

</head>

<body>
  <?php include_once("Dashboard.php"); ?>

  <div class="container1">
    <div class="page-address">
      <h1>Add Admin</h1>
    </div>

    <form action="" mathod="POST" enctype="multipart/form-data">
      <div class="all-fields">

        <div class="massage"> </div>



        <div class="input-field">
          <label for="username">User Name:</label>
          <br>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="input-field">
          <label for="password">Password:</label>
          <br>
          <input type="text" id="password" name="password" required>
        </div>
        <div class="input-field">
          <label for="email">Phone:</label>
          <br>
          <input type="number" id="phone" name="phone" min="11" max="11">
        </div>

        <div class="input-field">
          <label for="role">Role:</label>
          <br>
          <input list="role" name="role">
          <datalist id="role">
            <option value="0">Sub Admin</option>
            <option value="1">Admin</option>
          </datalist>
        </div>
        <div class="input-field file">
          <label for="userPhoto">Photo:</label>
          <br>
          <input type="file" id="userPhoto" name="photo" accept="image/*">

          <img src="" class="photo" height="500px" width="100%">
        </div>
        <div class="input-field  submit">
          <input type="submit" name="submit" value="Add User">
        </div>

      </div>    
      <!--end all feilds -->
    </form>




    <div class="main-content">
      <h3 class="address"> Show Admin And Sub Admins Info In Your System</h3>

      <table id="files_list" class="table table-striped dt-responsive  " style="width:100%">
        <thead class="thead_dark">
          <tr>
            <th class="th_text">User Name</th>
            <th class="th_text">Password</th>
            <th class="th_text">Phone</th>
            <th class="th_text">Date</th>
            <th class="th_text">Role</th>
            <th class="th_text">Photo</th>
            <th class="th_text">Control</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($get_admin_data as $data) {?>
          <tr>

            <td><?=$data['UserName'] ?> </td>
            <td><?=$data['Password'] ?> </td>
            <td><?=$data['Number'] ?> </td>
            <td><?=$data['Date'] ?> </td>
            <td><?=$data['Status'] ?> </td>
            <td>
               <img src="Images/<?=$data['Img']?>" 
               height="50px" width="50px" style="border-radius:50%"> </td>

            <td>
              <button class="btn btn-sm btn-download btn-info "> 
              <i class="fa-solid fa-user-xmark"></i>
              </button>
            </td>

          </tr>
           <?php }?>


        </tbody>
      </table>
    </div>



  </div>
  <!-- end container -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
  <script src="../JS/table.js"></script>
  <script src="../JS/Admin.js"></script>
</body>

</html>